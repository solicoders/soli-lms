---
layout: default
order: 1
---
{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
  {% if page.chapitre or page.package == "GestionFormation" %}
    {{- page.content | markdownify -}}
  {% endif %}
{% endfor %}