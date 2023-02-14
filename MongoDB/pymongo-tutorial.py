from bson.objectid import ObjectId
import pprint
import datetime
from pymongo import MongoClient

# Making Connection with MongoClient
client = MongoClient("mongodb://booruledie:booruledie@localhost:27017")

# Getting Database
db = client.test_database
# db = client["test_database"] could be used as well

# Getting Collection
collection = db.test_collection
# collection = db.["test_collection"] could be used as well

# Inserting Documents
post = {
    "author": "Mike",
    "text": "My first blog post!",
    "tags": ["mongodb", "python", "pymongo"],
    "date": datetime.datetime.utcnow()
}

posts = db.posts
post_id = posts.insert_one(post).inserted_id
# print(post_id)

# Getting Document
# pprint.pprint(posts.find_one({"author":"Mike"}))

# Query by ObjectId
queryFromObjectId = client.test_database.posts.find_one(
    {"_id": ObjectId("63eb208124b400f427cfccc5")})
# pprint.pprint(queryFromObjectId)

# Bulk Inserts
new_posts = [
    {"author": "Mike",
        "text": "Another post!",
        "tags": ["bulk", "insert"],
        "date": datetime.datetime(2009, 11, 12, 11, 14)},
    {"author": "Eliot",
     "title": "MongoDB is fun",
     "text": "and pretty easy too!",
     "date": datetime.datetime(2009, 11, 10, 10, 45)}]

result = client.test_database.posts.insert_many(new_posts)
# for id in result.inserted_ids:
#     print(id)

# As you see, mongodb doesn't enforce you to use a particular schema
# Look at the last insert, it doesn't have a tags property

# Query More than One Document
for post in client.test_database.posts.find():  # returns all the data in the collection
    # pprint.pprint(post)
    pass

# You can specify conditions as we've done in the find_one() method
for post in client.test_database.posts.find({"author": "Eliot"}):
    # pprint.pprint(post)
    pass

# Counting Documents
# print(client.test_database.posts.count_documents({}))  # count all of them
# print(client.test_database.posts.count_documents({"author": "Eliot"}))

# Example of an Advanced Query
d = datetime.datetime(2023, 11, 11, 12, 30, 55, 30)

result = client.test_database.posts.find({"date": {"$lt": d}}).sort("date")
if result:
    for r in result:
        pprint.pprint(r)
        
