import asyncio

"""
async programming is all about using idle time so the we can use CPU more efficiently. It's not same as threading, multiprocessing... 
"""


async def main():
    task = asyncio.create_task(printStuffReturn10())
    print("First Text")
    await asyncio.sleep(3)  # idle time created, task can use CPU now
    print("Second Text")

    # if the main function terminates before the task you can't execute the task completely so it's important to await tasks
    result = await task
    print(f"Result: {result}")


async def printStuffReturn10():
    for _ in range(3):
        await asyncio.sleep(1)
        print("Printed stuff")

    return 10


asyncio.run(main())


"""
Sync Programming:

First Text
Second Text
Printed stuff
Printed stuff
Printed stuff
Result: 10


Async Programming:

First Text
Printed stuff
Printed stuff
Second Text
Printed stuff
Result: 10
"""
