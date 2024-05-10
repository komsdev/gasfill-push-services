const Service = require('node-windows').Service;
const svc = new Service({
    name: 'Gasfill',
    description: 'My Node.js app as a Windows service.',
    script: 'F:\\repo\\gasfill\\server.js'
  });
  svc.on('install', () => {
    svc.start();
  });
  svc.install();