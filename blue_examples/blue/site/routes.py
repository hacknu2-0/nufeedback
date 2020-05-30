from flask import Blueprint,render_template

mod = Blueprint('site',__name__,template_folder='templates')

@mod.route('/')
def home():
    return render_template('index.html')
