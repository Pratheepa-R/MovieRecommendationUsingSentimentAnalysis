import sys
from textblob import TextBlob
import mysql.connector as sq
from datetime import datetime
def analyze_sentiment(review):
    analysis = TextBlob(review)
    return analysis.sentiment.polarity
name=sys.argv[1]
moviename=sys.argv[2]
review=sys.argv[3]
x=analyze_sentiment(review)
con=sq.connect(host="localhost",user="root",passwd="",database="movies")
cursor=con.cursor()
cursor.execute("select * from rating where movie=%s",(moviename,))
result=cursor.fetchall()
score=result[0][1]
score=(score+x)/2
currentyear=datetime.now().year
cursor.execute("select * from films where name=%s",(moviename,))
result=cursor.fetchall()
releaseyear=result[0][2]
x=currentyear-int(releaseyear)
if x<=5:
    y=1
elif x<=10:
    y=0.5
elif x<=15:
    y=0
elif x<=20:
    y=-0.5
else:
    y=-1
score=(score+y)/2
cursor.execute("update rating set score=%s where movie=%s",(score,moviename))
con.commit()
cursor.close()
con.close()

