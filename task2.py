from flask import Flask, request, render_template
import requests

app = Flask(__name__)

@app.route('/', methods=['GET', 'POST'])
def keyword_checker():
    result = None

    if request.method == 'POST':
        keyword = request.form['keyword']
        url = 'http://www.example.com'  # Replace with the URL you want to check.

        try:
            response = requests.get(url)
            if response.status_code == 200:
                content = response.text
                if keyword in content:
                    result = f'The keyword "{keyword}" was found on {url}.'
                else:
                    result = f'The keyword "{keyword}" was not found on {url}.'
            else:
                result = f'Error: Unable to access {url}.'
        except requests.exceptions.RequestException:
            result = 'Error: Unable to access the website.'

    # i manually eddited this to match the repo's structure
    return render_template('task2.html', result=result)

if __name__ == '__main__':
    app.run(debug=True)
