import asyncio
import aiofiles
import time
import httpx

start = time.time()


async def get_file_and_save(filename):
    async with httpx.AsyncClient() as client:
        r = await client.get(
            "https://fastly.picsum.photos/id/1002/200/300.jpg?grayscale&hmac=BMjbTdYXIVDxMqOYdZJrPv71albI6CMYmhGRHyJwwdo"
        )
    async with aiofiles.open(f"./images/{filename}", mode="wb") as fp:
        await fp.write(r.content)


async def main():
    coroutine_set = set()
    for i in range(50):
        coroutine_set.add(get_file_and_save(f"file-{i}.png"))

    await asyncio.gather(*coroutine_set)


asyncio.run(main())


end = time.time()
print(f"it took {end - start} seconds")
# it took 0.8359086513519287 seconds
# it took 1.502971887588501 seconds
