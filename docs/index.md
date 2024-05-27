---
layout: default
order: 1
---

# Rapports

<a href="/soli-lms/pkg_global/rapport"> Rapport globale </a> 

## Par packages

<ul>
  {% for package in site.data.packages_json %}
    <li> <a href="/soli-lms/{{ package.name }}/rapport"> {{ package.titre }} </a> </li>
  {% endfor %}
</ul>
