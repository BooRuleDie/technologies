class Employees:
    def __init__(self, name, age, salary):
        self.name = name
        self.age = age
        self.salary = salary

    def __str__(self):
        return f"name = {self.name}, age = {self.age}, salary = {self.salary}"

    def work(self):
        print(f"{self.name} is working...")


class SoftwareEngineer(Employees):
    # overriding and extending __init__ method
    def __init__(self, name, age, salary, level):
        super().__init__(name, age, salary)
        self.level = level

    # overriding work method
    def work(self):
        print(f"{self.name} is coding...")

    def debug(self):
        print(f"{self.name} is debugging...")

    # overriding and extending __str__ method
    def __str__(self):
        return super().__str__() + f", level = {self.level}"


class Designer(Employees):
    # since it's inheriting from the Employees class, you don't have to define a __init__ method, it uses the parent class's __init__ method. And it applies for all methods and attributes
    # overriding work method
    def work(self):
        print(f"{self.name} is designing...")


se1 = SoftwareEngineer("Eren", 22, 5000, "Junior")
d1 = Designer("Burcak", 19, 3000)

se1.work()
d1.work()

se1.debug()

print(se1, d1, sep="\n")

# Polymorphism -> to be able to behave all instances as if they are a particular instance of a class
employees = [
    SoftwareEngineer("Efe", 19, 5000, "Junior"),
    Designer("Burcak", 19, 3000),
    SoftwareEngineer("Kemal", 19, 5000, "Junior"),
    Designer("Irfan", 19, 3000),
    SoftwareEngineer("Emre", 19, 5000, "Junior"),
]

for employee in employees:
    # they are different type of instances actually but I can treat all these instances as if they are just instance of a particular class
    employee.work()