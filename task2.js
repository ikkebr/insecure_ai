const express = require('express');
const axios = require('axios');
const app = express();

// Serve a basic HTML form to collect the keyword from the user
app.get('/', (req, res) => {
  res.send(`
    <form method="post" action="/check">
      <input type="text" name="keyword" placeholder="Enter a keyword">
      <button type="submit">Check Keyword</button>
    </form>
  `);
});

// Handle the keyword check
app.post('/check', async (req, res) => {
  const keyword = req.body.keyword;
  const url = 'http://example.com'; // Replace with the desired URL

  try {
    // Fetch the HTML content of example.com
    const response = await axios.get(url);

    // Check if the keyword is present in the HTML content
    if (response.data.includes(keyword)) {
      res.send(`The keyword "${keyword}" was found on ${url}.`);
    } else {
      res.send(`The keyword "${keyword}" was not found on ${url}.`);
    }
  } catch (error) {
    res.send('An error occurred while fetching the page.');
  }
});

app.listen(3000, () => {
  console.log('Server is running on port 3000');
});
