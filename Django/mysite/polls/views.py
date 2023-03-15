from django.http import HttpResponse, HttpResponseRedirect
from .models import Question, Choice
from django.shortcuts import render, get_object_or_404
from django.http import Http404
from django.urls import reverse
from django.db.models import F

# fetch the most recent 5 question
def index(request):
    latest_question_list = Question.objects.order_by('-pub_date')[:5]
    context = {'latest_question_list': latest_question_list}
    return render(request, 'polls/index.html', context)

def detail(request, question_id):
  try:
      question = Question.objects.get(pk = question_id) # pk means primary key
  except Question.DoesNotExist:
      raise Http404("Question does not exist")
  return render(request, 'polls/detail.html', {'question': question})

def results(request, question_id):
    question = get_object_or_404(Question, pk=question_id)
    return render(request, "polls/results.html", {"question" : question})

def vote(request, question_id):
    question = get_object_or_404(Question, pk = question_id)
    try:
        selectedChoice = question.choice_set.get(pk = request.POST["choice"])
    except(KeyError, Choice.DoesNotExist):
        # enforce user to use the form again
        return render(request, "polls/detail.html", {"question" : question, "error_message" : "You didn't select a choice"})
    # else
    selectedChoice.votes = F("votes") + 1
    selectedChoice.save()

    # always return a HTTP redirect after a successful form operation, it prevents user from submitting the same data
    return HttpResponseRedirect(reverse("polls:results", args=(question.id,)))
    
    
