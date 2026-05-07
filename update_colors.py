import re

with open('resources/views/welcome.blade.php', 'r') as f:
    content = f.read()

# The current tailwind config block
old_config = """    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            900: '#0c4a6e',
                        },
                        secondary: '#0f172a'
                    }
                }
            }
        }
    </script>"""

new_config = """    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#FCFCF5',
                            100: '#F5EEDC',
                            200: '#EADDBC',
                            300: '#DCC395',
                            400: '#CBA565',
                            500: '#C3A54D',
                            600: '#C3A54D', // Gold
                            700: '#987F3B', // Darker gold for hover
                            800: '#816C32',
                            900: '#624C1D', // Dark brown
                        },
                        secondary: '#362a10', // Very dark brown
                        gray: {
                            50: '#FCFCF5', // Cream
                            100: '#F5F5F0',
                            200: '#EBEBE6',
                            300: '#D6D6D0',
                            400: '#B8B8B2',
                            500: '#96816E', // Taupe
                            600: '#7A6858',
                            700: '#5C4E42',
                            800: '#624C1D', // Dark brown for text
                            900: '#362A10',
                        }
                    }
                }
            }
        }
    </script>"""

if old_config in content:
    content = content.replace(old_config, new_config)
else:
    print("Could not find the exact old config block. Trying regex...")
    content = re.sub(r'<script>\s*tailwind\.config.*?</script>', new_config, content, flags=re.DOTALL)

# Let's also fix the gradient that uses 'cyan-300' and other hardcoded colors that clash with the new palette.
# Find: bg-gradient-to-r from-primary-400 to-cyan-300
content = content.replace('to-cyan-300', 'to-primary-200')
# Find: bg-green-400
content = content.replace('bg-green-400', 'bg-primary-400')
# Find: bg-green-100 text-green-600
content = content.replace('bg-green-100', 'bg-primary-100').replace('text-green-600', 'text-primary-600')
content = content.replace('text-green-700', 'text-primary-700')
# Find: bg-blue-600
content = content.replace('text-blue-600', 'text-primary-600')
content = content.replace('text-rose-400', 'text-primary-400')
content = content.replace('text-amber-400', 'text-primary-400')
content = content.replace('text-emerald-400', 'text-primary-400')

with open('resources/views/welcome.blade.php', 'w') as f:
    f.write(content)
print("Colors updated successfully.")
