from flask import Flask,render_template,request,redirect,url_for,session
from flask_sqlalchemy import SQLAlchemy
import json
import datetime


app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///site.db'
app.config['SECRET_KEY'] = 'asdjasjkdasjhdajsdjabdjhuy7676yu'
db = SQLAlchemy(app)





class Classes(db.Model):
    id = db.Column(db.Integer,primary_key=True)
    course_code = db.Column(db.String(10),nullable=False)
    start_time = db.Column(db.DateTime,nullable=False)
    end_time = db.Column(db.DateTime,nullable=False)
    topics = db.Column(db.JSON)
    feedback = db.Column(db.JSON)


class Student(db.Model):
    id = db.Column(db.Integer,primary_key=True)
    email = db.Column(db.String(100),nullable=False)
    notif_token = db.Column(db.String(200))

class Teacher(db.Model):
    id = db.Column(db.Integer,primary_key=True)
    email = db.Column(db.String(100),nullable=False)



@app.route('/create_class_entries')
def create_class_entries():
    topics = {'1':'Finite State Machines',
               '2':'Context Free Grammar(Overview)',
              '3':'Turing Machines (Overview)'}
    topics1 = {'1': 'ER Diagrams',
              '2': 'Normalization'
              }
    class1 = Classes(course_code='CS666',start_time=datetime.datetime.now() + datetime.timedelta(minutes=10),end_time=datetime.datetime.now() + datetime.timedelta(minutes=11),topics=json.dumps(topics))
    class2 = Classes(course_code='CS069', start_time=datetime.datetime.now() + datetime.timedelta(minutes=20),
                     end_time=datetime.datetime.now() + datetime.timedelta(minutes=21), topics = json.dumps(topics1))
    db.session.add(class1)
    db.session.add(class2)
    db.session.commit()
    return "success"



@app.route('/')
def index():
    if 'email' in session:
        email = session['email']
        classes = Classes.query.order_by(Classes.start_time.desc()).limit(2).all()
        for thing in classes:
            thing.topics = json.loads(thing.topics)
        return render_template('index.html',classes = classes)
    else:
        return redirect(url_for('login'))




@app.route('/login',methods=['POST','GET'])
def login():
    if 'email' in session:
        return redirect(url_for('index'))
    if request.method == "POST":
        if request.form['email'] == 'srilikhith.sajja18@st.niituniversity.in' and request.form['password'] == '0000':
            session['email'] = 'srilikhith.sajja18@st.niituniversity.in'
            return redirect(url_for('index'))
        else:
            return render_template('login.html')
    return render_template('login.html')



@app.route('/feedback',methods=['GET','POST'])
def feedback():
    if request.method == 'POST':
        if 'topic1' in request.form:
            print('topic1 '+request.form['topic1'])
        if 'topic2' in request.form:
            print('topic2 '+request.form['topic2'])
        if 'topic3' in request.form:
            print('topic3 '+request.form['topic3'])
        print(request.form['slider_val'])
        return render_template('scam.html')
    return render_template('scam.html')


if __name__ == '__main__':
    app.run(debug=True)
