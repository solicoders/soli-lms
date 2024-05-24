---
layout: presentation
order: 1
---

{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
 {% if page.presentation or page.presentationPackage == 'pkg_gestion_rh' %}
    {{- page.content | markdownify -}}
  {% endif %}
{% endfor %}