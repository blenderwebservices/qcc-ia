with open('resources/views/welcome.blade.php', 'r') as f:
    content = f.read()

content = content.replace('qcc_nosotros.html', "{{ route('nosotros') }}")
content = content.replace('qcc_servicios.html', '/servicios')
content = content.replace('qcc_sectores.html', '/sectores')
content = content.replace('qcc_sectores.html#cotizar', '/sectores#cotizar') # Will be caught by the above, but wait: if the above runs first, it becomes `/sectores#cotizar` which is fine.

with open('resources/views/welcome.blade.php', 'w') as f:
    f.write(content)
