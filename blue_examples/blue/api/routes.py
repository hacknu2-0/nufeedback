from flask import Blueprint

mod = Blueprint('api',__name__)

@mod.route('/classes')
def classes():
    return '{"result":"You are in the api"}'
