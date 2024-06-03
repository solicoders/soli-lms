---
layout: default
order: 1
---

# Rapports

<a href="/soli-lms/pkg_global/rapport"> Rapport globale </a> 

## Par packages

<ul>
  {% for package in site.data.packages %}
    <li> <a href="/soli-lms/{{ package }}/rapport"> {{ package }} </a> </li>
  {% endfor %}
</ul>

# Evaluation

## Maquettages
<ul>
  {% for evaluation in site.data.evaluations.evaluations %}
    <li>
      {{ evaluation.name }}
      <ul>
        {% for item in evaluation.items %}
              <li> <a href="/soli-lms/Evaluations/{{ evaluation.name }}/{{ item }}/rapport"> {{ item }} </a> </li>
        {% endfor %}
      </ul>
    </li>
  {% endfor %}
</ul>
