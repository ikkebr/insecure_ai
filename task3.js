const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// MySQL database connection configuration
const db = mysql.createConnection({
  host: 'localhost',
  user: 'your_username',
  password: 'your_password',
  database: 'your_database_name',
});

// Connect to the MySQL database
db.connect((err) => {
  if (err) {
    console.error('Database connection failed: ' + err.stack);
    return;
  }
  console.log('Connected to the database as ID ' + db.threadId);
});

// Middleware for parsing JSON and URL-encoded data
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Define a route to check if a name is in the database
app.get('/checkName', (req, res) => {
  const nameToCheck = req.query.name;

  const query = 'SELECT * FROM names WHERE name = ?';
  db.query(query, [nameToCheck], (err, results) => {
    if (err) {
      console.error('Error querying the database: ' + err);
      res.status(500).json({ error: 'Database error' });
      return;
    }

    if (results.length > 0) {
      res.json({ found: true });
    } else {
      res.json({ found: false });
    }
  });
});

// Start the Express server
app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
