from time import time


def stopwatch(func):
    # wrapper function represents the updated function, that's why it's returned in the testDecorator function
    def wrapper(*args, **kwargs):
        start = time()
        result = func(*args, **kwargs)
        end = time()
        print(f"It took {end - start} seconds for function to terminate.")

        if result:
            return result

    return wrapper


@stopwatch
def doStuff(whatToSay):
    for _ in range(10_000_000):
        pass
    print(whatToSay)


doStuff("HULOLOOO !!!")
