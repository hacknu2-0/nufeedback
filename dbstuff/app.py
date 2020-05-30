from flask import Flask
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)

app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.config['SQLALCHEMY_DATABASE_URI']  = 'sqlite:///test.db'

db = SQLAlchemy(app)


subs = db.Table('subs',
        db.Column('student_id',db.Integer,db.ForeignKey('student.id')),
        db.Column('class_id',db.Integer,db.ForeignKey('classes.id'))
        )

class Student(db.Model):
    id = db.Column(db.Integer,primary_key=True)
    email = db.Column(db.String(100))
    notif_key = db.Column(db.String(250))
    active_classes = db.relationship('Classes', secondary=subs, backref=db.backref('students', lazy = 'dynamic'))


class Classes(db.Model):
    id = db.Column(db.Integer,primary_key=True)
    course_code = db.Column(db.String(10))
    weekday = db.Column(db.String(15))
    teacher_id = db.Column(db.Integer, db.ForeignKey('teacher.id'))

class Teacher(db.Model):
    id = db.Column(db.Integer,primary_key=True)
    email = db.Column(db.String(20))
    classes = db.relationship('Classes',backref='teacher')




def add_teacher(email):
    teacher1 = Teacher(email = email)
    db.session.add(teacher1)
    db.session.commit()

def add_class(couse_code,weekday,teacher_email):
    teacher1 = Teacher.query.filter_by(email=teacher_email).first()
    class1 = Classes(course_code=couse_code,weekday=weekday,teacher=teacher1)
