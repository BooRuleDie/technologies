import motor.motor_asyncio

# Connecting to the Database
client = motor.motor_asyncio.AsyncIOMotorClient("mongodb://booruledie:booruledie@localhost:27017")

# Getting Database
# creating reference to the database doesn't require await keyword 
db = client.test_database

# Getting Collection
# creating reference to the collection doesn't require await keyword 
collection = db.test_collection

# Insert Document
async def Insert():
    document = {"hulolo" : "test"}
    result = await collection.insert_one(document)
    print(result.inserted_id)

# loop = client.get_io_loop()
# loop.run_until_complete(Insert())

# Insert Many
async def InsertMany():
    document = [{
        "name" : "hulolo",
        "age" : 1,
        "message" : "hulolo the message"
        }]
    result = await client.test_database.test_collection.insert_many(document)
    print(result.inserted_ids)

loop = client.get_io_loop()
loop.run_until_complete(InsertMany())

# Rest of the operations are same as the PyMongo you can either look at the documentation or the pymongo python file