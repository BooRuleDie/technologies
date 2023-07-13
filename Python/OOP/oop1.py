# class
class SoftwareEngineer:
    # class attributes -> can be fetched from the class or any instance of class
    alias = "Developer"

    def __init__(self, name, age, level, salary):
        # instance attributes -> they are exclusive to the particular instances of the class
        self.name = name
        self.age = age
        self.level = level
        self.salary = salary


# instance
se1 = SoftwareEngineer("Eren", 22, "Senior", 5000)
se2 = SoftwareEngineer("Efe", 19, "Junior", 1000)
print(SoftwareEngineer.alias)
print(se1.name, se1.age, se1.level, se1.salary)
print(se2.name, se2.age, se2.level, se2.salary)
