from django.db import models

# question table
class Question(models.Model):
		# fields | columns in the database table
    question_text = models.CharField(max_length=200)
    pub_date = models.DateTimeField(verbose_name = 'date published') # optional argument

    def __str__(self):
        return self.question_text

# choice table
class Choice(models.Model):
		# fields
    question = models.ForeignKey(Question, on_delete=models.CASCADE)
    choice_text = models.CharField(max_length=200)
    votes = models.IntegerField(default=0)

    def __str__(self):
        return f"q:{self.question} -> a:{self.choice_text}"