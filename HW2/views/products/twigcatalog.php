<h1>Каталог</h1>
<table>
{% for item in product %}
<tr>
{% for value in item %}
    <td>{{ value is same as  ('bd') ? value}}</td>
  
    {% endfor %}
</tr>
{% endfor %}
</table>