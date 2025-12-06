// Service Worker for PinePix PWA
// Install event
self.addEventListener('install', (event) => {
    console.log('[Service Worker] Installing...');
    self.skipWaiting();
});

// Activate event
self.addEventListener('activate', (event) => {
    console.log('[Service Worker] Activating...');
    event.waitUntil(self.clients.claim());
});

// Handle background sync (for future offline form submissions)
self.addEventListener('sync', (event) => {
    if (event.tag === 'background-sync') {
        console.log('[Service Worker] Background sync triggered');
        // Implement background sync logic here
    }
});

// Handle push notifications (for future implementation)
self.addEventListener('push', (event) => {
    console.log('[Service Worker] Push notification received');
    const options = {
        body: event.data ? event.data.text() : 'New update available',
        icon: '/favicon-96x96.png',
        badge: '/favicon-96x96.png',
        vibrate: [200, 100, 200],
        tag: 'pinepix-notification',
        requireInteraction: false
    };
    event.waitUntil(
        self.registration.showNotification('PinePix', options)
    );
});

// Handle notification clicks
self.addEventListener('notificationclick', (event) => {
    event.notification.close();
    event.waitUntil(
        clients.openWindow('/')
    );
});

