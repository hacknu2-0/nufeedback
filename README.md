# nufeedback
nuHack2.0

## Installation

`cd demoapp`  
`pip install -r requirements.txt`  
`python create_db.py`  
`python app.py`  

Then open http://localhost:5000/create_class_entries to populate the database with sample data.  

Then go to http://localhost:5000/ and login with  
srilikhith.sajja18@st.niituniversity.in:0000  
(email:password)  

The demo app has only one user that is hardcoded.^^  

The feedback page only logs the input to console.  

The forum app is written in php and is not connected to the feedback app yet.  

Notifications haven't been integrated either, the code can be found in the notifs folder.  

## Installation for NUForum

The files are under NUForum/  


Requirements:  

*PHP 7.4  
*Mariadb  
*Apache2  

Import `initialize_database.sql` into your sql server. 

Create a new user `root` identified an empty password.  

Make sure the mysqli extension is enabled in your php configuration file(php.ini).  

Make sure port 25 is open for SMTP.  

Copy the files in NUForum/NUforum to your document root.  



