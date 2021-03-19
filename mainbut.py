#!/usr/bin/env python
# coding: utf-8

# In[ ]:


# XXX means can be deleted in final deploy


# In[ ]:


import mysql.connector

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="root",
    database="test",
    port=3307
)

mycursor = mydb.cursor()


# In[ ]:


import pandas as pd
import numpy as np
import random
from grouping import grouping
from rating import rate
pd.set_option('display.max_rows', 500) #XXX
pd.set_option('display.max_columns', 500) #XXX
pd.set_option('display.width', 800) #XXX


# In[ ]:


# Create a column of names #XXX
names = pd.DataFrame({"name": ["Roman Tsypin", "Eric Telkkälä", "Topi Aila", "Samantha Bergdahl", "Cezar Budeci", "Tuuli Tapaninen", "Kaisa Otterklau", "Humble Harambe", "Moms Spaghetti", "Sanna Marin", "Wide Putin", "Peter Vesterbacka", "Timo Rally", "Emotional Table", "Bill Gates", "Elon Musk", "Mark Zuckerberg", "Ayn Rand", "Karl Marx", "David Ben-Gurion", "Ekaterina Shulman", "Tukhtaboy Juma", "Igor Smirnov"]})


# In[ ]:


# Create some random grades and add them to the dataframe #XXX
rel_grades = []
irrel_grades = []
motivation = []
group_id = []
student_id = []
class_id = []
z = 1
for i in range(len(names)):
    rel_grades.append(round(random.uniform(2, 5), 3))
    irrel_grades.append(round(random.uniform(2, 5), 3))
    motivation.append(round(random.randint(1, 5)))
    group_id.append(123)
    student_id.append(z)
    z = z + 1
    class_id.append(999)
    


# In[ ]:


# Create the table with grades
names["relevant_grades"] = rel_grades
names["irrelevant_grades"] = irrel_grades
names["motivation"] = motivation
names["group_id"] = student_id
names["student_id"] = student_id
names["class_id"] = class_id
print(names)


# In[ ]:


# Calculating rating for students and adding it to the table
rating = []
for i in range(len(names)):
    rating.append(rate(names.iloc[i]["relevant_grades"], names.iloc[i]["irrelevant_grades"], names.iloc[i]["motivation"]))
names["rating"] = rating
print(names)


# In[ ]:


# Sorting the table by rating
names_sorted = names.sort_values("rating", ascending = False, ignore_index = True)
print(names_sorted)


# In[ ]:


# Try grouping with different min and max members:

min_memb = 3
max_memb = 4

alpha_interval = 0
example = grouping(names_sorted, min_memb, max_memb)
while len(example["group" + str(len(example) - 1)]) < min_memb:
    alpha_interval = alpha_interval + 0.05
    alpha = round(random.uniform(-alpha_interval, alpha_interval), 3)
    example = grouping(names_sorted, min_memb, max_memb, alpha)
for key in example:
    example[key]["group_id"] = key
for i in example: 
    print(example[i])


# In[ ]:


val = []
for i in range(len(example)):
    for j in range(len(example["group" + str(i)])):
        a = str(example["group" + str(i)][['student_id', 'group_id', "class_id"]].iloc[j]["student_id"])
        b = str(example["group" + str(i)][['student_id', 'group_id', "class_id"]].iloc[j]["group_id"])
        c = str(example["group" + str(i)][['student_id', 'group_id', "class_id"]].iloc[j]["class_id"])
        val.append((a, b, c))
print(val)


# In[ ]:


sql = "INSERT INTO students (student_id, group_id, class_id) VALUES (%s, %s, %s)"
   
mycursor.executemany(sql, val)

mydb.commit()

print(mycursor.rowcount, "record inserted.")

mycursor.execute("SELECT * FROM students")

myresult = mycursor.fetchall()

for x in myresult:
    print(x)

