class SoftwareEngineer:
    alias = "Developer"

    def __init__(self, name, age, level, salary):
        self.name = name
        self.age = age
        self.level = level
        self.salary = salary

    # dunder methods: __str__, __eq__ ...
    # __str__ is used to inform developer by printing the object (instance)
    def __str__(self):
        return f"name = {self.name}, age = {self.age}, level = {self.level}, salary = {self.salary}"

    # this one is used to compare objects properly
    def __eq__(self, otherObject):
        return (
            self.name == otherObject.name
            and self.age == otherObject.age
            and self.level == otherObject.level
            and self.salary == otherObject.salary
        )

    # instance methods
    def code(self, language):
        print(f"{self.name} is coding in {language}")

    # class methods (static methods) -> in these functions you can't access to the instance attributes self.* -> error
    @staticmethod
    def calculateSalaryBasedOnAge(age):
        if age < 25:
            return 1000
        elif age < 30:
            return 3000
        return 5000


se1 = SoftwareEngineer("Eren", 22, "Senior", 5000)
se1_copy = SoftwareEngineer("Eren", 22, "Senior", 5000)
se2 = SoftwareEngineer("Efe", 19, "Junior", 1000)

# thanks to __str__
print(se1, se2, sep="\n")

# thanks to __eq__
print(se1 == se1_copy)  # True
print(se1 == se2)  # False

# static method call
print(SoftwareEngineer.calculateSalaryBasedOnAge(10))
print(SoftwareEngineer.calculateSalaryBasedOnAge(26))
print(SoftwareEngineer.calculateSalaryBasedOnAge(60))

# instance method call
se1.code("Python")
