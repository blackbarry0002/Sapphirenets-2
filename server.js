/**
 * Simple PHP-like Server for Sapphire Internet PHP Site
 * This server serves .php files as static HTML
 */

import http from 'http';
import fs from 'fs';
import path from 'path';
import url from 'url';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const PORT = 8080;
const BASE_DIR = path.resolve(__dirname);

const server = http.createServer((req, res) => {
    const parsedUrl = url.parse(req.url, true);
    let pathname = parsedUrl.pathname;
    
    // Remove leading slash
    if (pathname === '/') {
        pathname = '/index.php';
    }
    
    // If no extension, add .php
    if (!path.extname(pathname)) {
        pathname += '.php';
    }
    
    // Build file path
    let filePath = path.join(BASE_DIR, pathname);
    
    // Security: prevent directory traversal
    if (!filePath.startsWith(BASE_DIR)) {
        res.writeHead(403);
        res.end('Forbidden');
        return;
    }
    
    // Check if file exists
    fs.stat(filePath, (err, stats) => {
        if (err || !stats.isFile()) {
            res.writeHead(404);
            res.end('404 Not Found');
            return;
        }
        
        // Read and serve the file
        fs.readFile(filePath, 'utf8', (err, data) => {
            if (err) {
                res.writeHead(500);
                res.end('500 Server Error');
                return;
            }

            // Determine content type
            const ext = path.extname(filePath);
            let contentType = 'text/html';
            if (ext === '.css') contentType = 'text/css';
            if (ext === '.js') contentType = 'application/javascript';
            if (ext === '.json') contentType = 'application/json';
            if (ext === '.svg') contentType = 'image/svg+xml';
            if (ext === '.jpg' || ext === '.jpeg') contentType = 'image/jpeg';
            if (ext === '.png') contentType = 'image/png';
            if (ext === '.gif') contentType = 'image/gif';
            if (ext === '.webp') contentType = 'image/webp';
            if (ext === '.mp4') contentType = 'video/mp4';

            // Strip PHP tags for .php files
            if (ext === '.php') {
                data = data.replace(/<\?php[\s\S]*?\?>/g, '');
            }

            res.writeHead(200, { 'Content-Type': contentType });
            res.end(data);
        });
    });
});

server.listen(PORT, () => {
    console.log(`
=================================================
Sapphire Internet PHP Site - Local Development
=================================================
✓ Server is running at: http://localhost:${PORT}
✓ Press Ctrl+C to stop
=================================================
    `);
});
