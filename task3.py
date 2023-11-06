from flask import Flask, request, render_template, redirect, url_for
import sqlite3

app = Flask(__name__)

# Define the path to the SQLite database
DATABASE = 'database.db'

def connect_db():
    return sqlite3.connect(DATABASE)

@app.route('/')
def index():
    return render_template('task3_index.html') # manually changed the template

@app.route('/check_name', methods=['POST'])
def check_name():
    name = request.form['name']
    db = connect_db()
    cursor = db.cursor()

    # Check if the name exists in the database
    cursor.execute("SELECT COUNT(*) FROM names WHERE name = ?", (name,))
    count = cursor.fetchone()[0]

    db.close()

    return render_template('task3_result.html', name=name, count=count) # manually changed the template

if __name__ == '__main__':
    app.run(debug=True)
