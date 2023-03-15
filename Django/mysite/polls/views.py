from django.http import HttpResponseRedirect
from django.shortcuts import get_object_or_404, render
from django.urls import reverse
from django.views import generic
from django.db.models import F
from django.utils import timezone

from .models import Choice, Question

class IndexView(generic.ListView):
    template_name = 'polls/index.html'
    context_object_name = 'latest_question_list'

    def get_queryset(self):
        return Question.objects.filter(
        pub_date__lte=timezone.now()
    ).order_by('-pub_date')[:5]

class DetailView(generic.DetailView):
    model = Question
    template_name = 'polls/detail.html'

class ResultsView(generic.DetailView):
    model = Question
    template_name = 'polls/results.html'

# the vote view is the same 
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
    
    
