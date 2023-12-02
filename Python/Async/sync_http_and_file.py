import httpx
import time

start = time.time()

for i in range(50):
    r = httpx.get(
        "https://fastly.picsum.photos/id/866/200/300.jpg?hmac=rcadCENKh4rD6MAp6V_ma-AyWv641M4iiOpe1RyFHeI"
    )
    with open(f"./images/file-{i}.png", "wb") as f:
        f.write(r.content)

end = time.time()
print(f"it took {end - start} seconds")
# it took 9.569497346878052 seconds for 50 iterations
