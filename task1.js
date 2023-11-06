const express = require('express');
const app = express();
const port = 3000;

// Set up a route to handle incoming requests
app.get('/', (req, res) => {
  // Get the value of the 'arg1' query parameter from the request
  const arg1 = req.query.arg1;

  // Check if 'arg1' is provided in the query string
  if (arg1) {
    res.send(`Value of 'arg1': ${arg1}`);
  } else {
    res.send('Please provide a value for "arg1" in the query string.');
  }
});

// Start the server
app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
