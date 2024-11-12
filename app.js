const express = require('express');
const app = express();

// Serve the HTML file
app.get('/', (req, res) => {
  res.sendFile(__dirname + '/intra.html');
});

// Start the server
const port = 3000;
app.listen(port, () => {
  console.log(`Server listening at http://localhost:${port}`);
});
