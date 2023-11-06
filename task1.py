from flask import Flask, request

app = Flask(__name)

@app.route('/')
def index():
    # Get the value of the 'arg1' query parameter from the user's request
    arg1 = request.args.get('arg1', 'No argument provided')
    
    # Return the argument value as a response
    return f'arg1: {arg1}'

if __name__ == '__main__':
    app.run(debug=True)
