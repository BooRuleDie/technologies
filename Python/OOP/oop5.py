class SoftwareEnginner:
    def __init__(self, name, age):
        self.name = name
        self.age = age
        self._salary = None

    # getter
    @property
    def salary(self):
        return self._salary
    
    # setter
    @salary.setter
    def salary(self, newSalary):
        self._salary = newSalary

    # deleter
    @salary.deleter
    def salary(self):
        del self._salary

se1 = SoftwareEnginner("Eren", 22)

se1.salary = 1000
print(se1.salary)
# del se1.salary
# print(se1.salary)