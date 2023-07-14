"""
_instanceVariable -> underscore prefix is used to indicate that the attribute should be treated as a private instance variable and not be called from the outside directly

Since python doesn't apply a strict enforcement about private instance attributes you can still call it but you shouldn't, instead you should use a getter, setter method 
"""


class SoftwareEngineer:
    def __init__(self, name, age):
        self.name = name
        self.age = age
        self._salary = None
        self._bugsSolved = 0  # doesn't have a getter, setter method meaning it's completely private instance attribute

    # getter
    def getSalary(self):
        return self._salary

    # setter
    def setSalary(self, baseValue):
        self._salary = self._calculateSalary(baseValue)

    def code(self):
        self._bugsSolved += 1

    def _calculateSalary(self, baseValue):
        if self._bugsSolved < 50:
            return baseValue
        elif self._bugsSolved < 100:
            return baseValue * 2
        else:
            return baseValue * 3


se1 = SoftwareEngineer("Eren", 21)

for _ in range(51):
    se1.code()

print(se1._bugsSolved)

# applies abstraction principle, doesn't reveal the logic behind _calculateSalary method and just asks for a baseValue for the salary for all calculations
se1.setSalary(1000)
print(se1.getSalary())