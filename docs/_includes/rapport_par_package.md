{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}

{% if package_name == "pkg_global" %}

{% if page.is_global == false %}
{% continue %} 
{%  endif %} 

{%  else %} 

{% if page.package != "pkg_rapport" and page.package !=  package_name  %}
{% continue %} 
{%  endif %} 

{% endif %}


{% if page.chapitre == true and page.package != "pkg_rapport" %}
<!-- {{- page.path  | markdownify -}} -->
    {{- page.content | markdownify -}}
{%  endif %} 

 
{% endfor %}
