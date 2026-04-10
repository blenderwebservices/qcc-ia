<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nosotros - Quality & Competitive College</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">

    <!-- Tailwind v4 -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    
    <!-- React & Babel CDNs -->
    <script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://unpkg.com/lucide-react@latest/dist/umd/lucide-react.js"></script>

    <style type="text/tailwindcss">
        @theme {
            --font-sans: 'Inter', ui-sans-serif, system-ui, sans-serif;
        }
        @keyframes blob {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        .animate-blob {
            animation: blob 15s infinite;
        }
    </style>
</head>
<body class="antialiased font-sans bg-[#F0F4FF]">
    <div id="root">
        <div class="flex items-center justify-center min-h-screen">
            <div class="text-center">
                <div class="inline-block w-8 h-8 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
                <p class="mt-4 font-bold text-slate-600">Cargando experiencia QCC...</p>
            </div>
        </div>
    </div>

    @verbatim
    <script type="text/babel">
        // Debug logging
        console.log("React available:", !!window.React);
        console.log("lucideReact available:", !!window.lucideReact);

        const { useState, useEffect, useRef } = React;
        
        // Helper para iconos resilientes
        const Icon = ({ name, size = 24, className = "" }) => {
            const LucideIcon = window.lucideReact ? window.lucideReact[name] : null;
            if (!LucideIcon) {
                const fallbackStyle = { width: size, height: size };
                return <div style={fallbackStyle} className={`bg-slate-200 rounded-sm inline-block ${className}`}></div>;
            }
            return <LucideIcon size={size} className={className} />;
        };

        // Definimos los componentes de icono para que el código original no cambie mucho
        const ShieldCheck = (props) => <Icon name="ShieldCheck" {...props} />;
        const BookOpen = (props) => <Icon name="BookOpen" {...props} />;
        const CheckCircle = (props) => <Icon name="CheckCircle" {...props} />;
        const Menu = (props) => <Icon name="Menu" {...props} />;
        const X = (props) => <Icon name="X" {...props} />;
        const ChevronRight = (props) => <Icon name="ChevronRight" {...props} />;
        const Award = (props) => <Icon name="Award" {...props} />;
        const Globe = (props) => <Icon name="Globe" {...props} />;
        const Mail = (props) => <Icon name="Mail" {...props} />;
        const Phone = (props) => <Icon name="Phone" {...props} />;
        const MapPin = (props) => <Icon name="MapPin" {...props} />;
        const Search = (props) => <Icon name="Search" {...props} />;
        const Eye = (props) => <Icon name="Eye" {...props} />;
        const Target = (props) => <Icon name="Target" {...props} />;
        const Sparkles = (props) => <Icon name="Sparkles" {...props} />;
        const Send = (props) => <Icon name="Send" {...props} />;
        const Zap = (props) => <Icon name="Zap" {...props} />;
        const HelpCircle = (props) => <Icon name="HelpCircle" {...props} />;
        const RefreshCw = (props) => <Icon name="RefreshCw" {...props} />;
        const Sun = (props) => <Icon name="Sun" {...props} />;
        const Moon = (props) => <Icon name="Moon" {...props} />;
        const Leaf = (props) => <Icon name="Leaf" {...props} />;
        const Palette = (props) => <Icon name="Palette" {...props} />;
        const AlertTriangle = (props) => <Icon name="AlertTriangle" {...props} />;
        const FileText = (props) => <Icon name="FileText" {...props} />;

        @endverbatim
        // Configuración de Gemini API desde el backend
        @php
            $driver = config('ai.default');
            $aiKey = config("ai.providers.{$driver}.key");
            $aiModel = config("ai.providers.{$driver}.model");
        @endphp
        const apiKey = "{{ $aiKey }}";
        const GEMINI_MODEL = "{{ $aiModel ?? 'gemini-2.0-flash-exp' }}"; 
        @verbatim

        /**
         * Componente Intérprete de Markdown sencillo para procesar la salida de la IA
         */
        const MarkdownRenderer = ({ content, themeClass }) => {
            if (!content) return null;

            const parseInline = (text) => {
                const parts = text.split(/(\*\*.*?\*\*)/g);
                return parts.map((part, i) => {
                    if (part.startsWith('**') && part.endsWith('**')) {
                        return <strong key={i} className="font-black opacity-90">{part.slice(2, -2)}</strong>;
                    }
                    return part;
                });
            };

            const blocks = content.split(/\n\n+/);

            return (
                <div className={`space-y-4 ${themeClass}`}>
                    {blocks.map((block, i) => {
                        if (block.startsWith('### ')) {
                            return <h4 key={i} className="text-lg font-black mt-6 mb-2 flex items-center gap-2">
                                <div className="w-1.5 h-6 bg-current opacity-20 rounded-full" />
                                {parseInline(block.replace('### ', ''))}
                            </h4>;
                        }
                        if (block.startsWith('## ')) {
                            return <h3 key={i} className="text-xl font-black mt-8 mb-4 border-b-2 border-current border-opacity-10 pb-2">
                                {parseInline(block.replace('## ', ''))}
                            </h3>;
                        }
                        if (block.includes('\n- ') || block.startsWith('- ') || block.startsWith('* ')) {
                            const items = block.split(/\n[-*] /).filter(item => item.trim());
                            return (
                                <ul key={i} className="list-none space-y-2 ml-2">
                                    {items.map((item, j) => (
                                        <li key={j} className="flex gap-3 items-start">
                                            <span className="mt-1.5 w-1.5 h-1.5 rounded-full bg-current opacity-40 shrink-0" />
                                            <span>{parseInline(item.replace(/^[-*] /, ''))}</span>
                                        </li>
                                    ))}
                                </ul>
                            );
                        }
                        return <p key={i} className="leading-relaxed opacity-90">{parseInline(block)}</p>;
                    })}
                </div>
            );
        };

        const App = () => {
            const [isMenuOpen, setIsMenuOpen] = useState(false);
            const [scrolled, setScrolled] = useState(false);
            const [showChat, setShowChat] = useState(false);
            const [chatInput, setChatInput] = useState("");
            const [theme, setTheme] = useState('light'); 
            const [showThemeMenu, setShowThemeMenu] = useState(false);
            
            const [chatMessages, setChatMessages] = useState([
                { role: 'assistant', text: '¡Hola! Soy tu asistente inteligente de QCC ✨. ¿En qué puedo ayudarte hoy sobre certificaciones ISO o auditorías?' }
            ]);
            const [isTyping, setIsTyping] = useState(false);
            
            const [activeTool, setActiveTool] = useState(null); 
            const [toolInput, setToolInput] = useState("");
            const [toolResult, setToolResult] = useState("");
            const [isToolLoading, setIsToolLoading] = useState(false);

            const chatEndRef = useRef(null);

            useEffect(() => {
                const handleScroll = () => {
                    setScrolled(window.scrollY > 50);
                };
                window.addEventListener('scroll', handleScroll);
                return () => window.removeEventListener('scroll', handleScroll);
            }, []);

            useEffect(() => {
                chatEndRef.current?.scrollIntoView({ behavior: "smooth" });
            }, [chatMessages]);

            const themeConfig = {
                light: {
                    bg: "bg-[#F0F4FF]",
                    text: "text-slate-800",
                    subtext: "text-slate-500",
                    card: "bg-white border-white shadow-[20px_20px_40px_rgba(0,0,0,0.08),inset_-6px_-6px_12px_rgba(0,0,0,0.05),inset_6px_6px_12px_rgba(255,255,255,1)]",
                    button: "bg-blue-600 text-white shadow-[8px_8px_16px_rgba(37,99,235,0.3),inset_-4px_-4px_8px_rgba(0,0,0,0.2),inset_4px_4px_8px_rgba(255,255,255,0.3)]",
                    accent: "text-blue-600",
                    accentBg: "bg-blue-600",
                    nav: "bg-white/80 border-white shadow-[10px_10px_20px_rgba(0,0,0,0.05)]",
                    toolBg: "bg-blue-50/30",
                    input: "bg-slate-50 border-transparent focus:border-blue-100",
                    footer: "border-white",
                    blob1: "bg-blue-200",
                    blob2: "bg-purple-200"
                },
                dark: {
                    bg: "bg-[#0F172A]",
                    text: "text-slate-100",
                    subtext: "text-slate-400",
                    card: "bg-slate-800 border-slate-700 shadow-[15px_15px_30px_rgba(0,0,0,0.5),inset_-4px_-4px_8px_rgba(0,0,0,0.3),inset_4px_4px_8px_rgba(255,255,255,0.05)]",
                    button: "bg-indigo-500 text-white shadow-[8px_8px_16px_rgba(0,0,0,0.4),inset_-4px_-4px_8px_rgba(0,0,0,0.3),inset_4px_4px_8px_rgba(255,255,255,1)]",
                    accent: "text-indigo-400",
                    accentBg: "bg-indigo-500",
                    nav: "bg-slate-900/80 border-slate-700 shadow-[10px_10px_20px_rgba(0,0,0,0.3)]",
                    toolBg: "bg-slate-900/50",
                    input: "bg-slate-900 border-slate-700 focus:border-indigo-500 text-white",
                    footer: "border-slate-800",
                    blob1: "bg-indigo-900",
                    blob2: "bg-slate-800"
                },
                emerald: {
                    bg: "bg-[#ECFDF5]",
                    text: "text-emerald-950",
                    subtext: "text-emerald-700/70",
                    card: "bg-white border-emerald-50 shadow-[20px_20px_40px_rgba(5,150,105,0.1),inset_-6px_-6px_12px_rgba(0,0,0,0.02),inset_6px_6px_12px_rgba(255,255,255,1)]",
                    button: "bg-emerald-600 text-white shadow-[8px_8px_16px_rgba(5,150,105,0.2),inset_-4px_-4px_8px_rgba(0,0,0,0.2),inset_4px_4px_8px_rgba(255,255,255,0.3)]",
                    accent: "text-emerald-600",
                    accentBg: "bg-emerald-600",
                    nav: "bg-white/80 border-emerald-100 shadow-[10px_10px_20px_rgba(5,150,105,0.05)]",
                    toolBg: "bg-emerald-50/50",
                    input: "bg-emerald-50 border-transparent focus:border-emerald-200",
                    footer: "border-emerald-100",
                    blob1: "bg-emerald-200",
                    blob2: "bg-teal-200"
                }
            };

            const activeTheme = themeConfig[theme];

            const callGemini = async (prompt, systemPrompt = "") => {
                const url = `https://generativelanguage.googleapis.com/v1beta/models/${GEMINI_MODEL}:generateContent?key=${apiKey}`;
                const payload = {
                    contents: [{ parts: [{ text: prompt }] }],
                    systemInstruction: { parts: [{ text: systemPrompt }] }
                };

                for (let i = 0; i < 5; i++) {
                    try {
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(payload)
                        });
                        if (!response.ok) throw new Error('API Error');
                        const data = await response.json();
                        return data.candidates?.[0]?.content?.parts?.[0]?.text;
                    } catch (error) {
                        if (i === 4) throw error;
                        await new Promise(resolve => setTimeout(resolve, Math.pow(2, i) * 1000));
                    }
                }
            };

            const handleSendMessage = async (e) => {
                e.preventDefault();
                if (!chatInput.trim()) return;

                const userMsg = chatInput;
                setChatMessages(prev => [...prev, { role: 'user', text: userMsg }]);
                setChatInput("");
                setIsTyping(true);

                try {
                    const systemPrompt = "Eres un consultor experto de QCC. Tu tono es profesional. Usa Markdown (negritas, listas, encabezados) para estructurar tus respuestas.";
                    const result = await callGemini(userMsg, systemPrompt);
                    setChatMessages(prev => [...prev, { role: 'assistant', text: result || "Lo siento, tuve un problema al procesar tu solicitud." }]);
                } catch (err) {
                    setChatMessages(prev => [...prev, { role: 'assistant', text: "Error de conexión. Intenta de nuevo más tarde." }]);
                } finally {
                    setIsTyping(false);
                }
            };

            const handleToolAction = async (toolKey) => {
                if (!toolInput.trim()) return;
                setActiveTool(toolKey);
                setIsToolLoading(true);
                setToolResult("");

                try {
                    let prompt = "";
                    let system = "";

                    switch(toolKey) {
                        case 'diag':
                            system = "Eres un analista de QCC. Usa Markdown para presentar un diagnóstico con secciones claras y listas de pasos.";
                            prompt = `Empresa: ${toolInput}. Diagnóstico rápido.`;
                            break;
                        case 'expl':
                            system = "Explica conceptos de ISO 9001 de forma sencilla usando Markdown.";
                            prompt = `Explica: ${toolInput}`;
                            break;
                        case 'risk':
                            system = "Genera una matriz de riesgos simplificada usando listas y negritas. No uses tablas complejas, usa listas con guiones.";
                            prompt = `Proceso: ${toolInput}. Analiza riesgos.`;
                            break;
                        case 'policy':
                            system = "Redacta una Política de Calidad profesional. Usa negritas para los compromisos clave.";
                            prompt = `Valores: ${toolInput}. Redacta la política.`;
                            break;
                        default: break;
                    }

                    const res = await callGemini(prompt, system);
                    setToolResult(res);
                } catch (err) {
                    setToolResult("Error al generar. Intenta de nuevo.");
                } finally {
                    setIsToolLoading(false);
                }
            };

            const clayBase = "rounded-[40px] transition-all duration-300";
            const clayCardClass = `${clayBase} border-4 ${activeTheme.card}`;
            const clayButtonClass = `${clayBase} px-8 py-4 font-bold ${activeTheme.button} hover:opacity-90 active:scale-95 disabled:opacity-50 transition-all`;
            const clayNavClass = `rounded-full backdrop-blur-md border-2 ${activeTheme.nav}`;

            const navLinks = [
                { name: 'Inicio', href: '/' },
                { name: 'Nosotros', href: '/nosotros' },
                { name: 'Servicios', href: '#services' },
                { name: 'IA Center ✨', href: '#ia-tools' },
            ];

            const ThemeButton = ({ mode, icon: Icon, label }) => (
                <button 
                    onClick={() => { setTheme(mode); setShowThemeMenu(false); }}
                    className={`flex items-center gap-3 w-full px-4 py-3 rounded-2xl text-sm font-bold transition-all ${theme === mode ? activeTheme.accentBg + ' text-white' : 'hover:bg-slate-100 text-slate-600'}`}
                >
                    <Icon size={18} /> {label}
                </button>
            );

            return (
                <div className={`min-h-screen ${activeTheme.bg} font-sans ${activeTheme.text} transition-colors duration-500 selection:bg-blue-200`}>
                    
                    {/* Navigation */}
                    <nav className={`fixed w-full z-50 p-4 transition-all duration-500 ${scrolled ? 'top-2' : 'top-4'}`}>
                        <div className={`container mx-auto max-w-6xl px-6 py-3 flex justify-between items-center ${clayNavClass}`}>
                            <div className="flex items-center space-x-2 cursor-pointer" onClick={() => window.location.href = '/'}>
                                <div className={`${activeTheme.accentBg} p-2 rounded-2xl shadow-lg`}>
                                    <ShieldCheck className="text-white w-6 h-6" />
                                </div>
                                <span className={`text-2xl font-black tracking-tight ${theme === 'dark' ? 'text-white' : 'text-blue-900'}`}>QCC</span>
                            </div>

                            <div className="hidden md:flex space-x-8 items-center">
                                {navLinks.map((link) => (
                                    <a key={link.name} href={link.href} className={`text-sm font-bold ${activeTheme.subtext} hover:${activeTheme.accent} transition-colors`}>
                                        {link.name}
                                    </a>
                                ))}
                                
                                <div className="relative">
                                    <button onClick={() => setShowThemeMenu(!showThemeMenu)} className={`p-2 rounded-xl border-2 border-transparent hover:${activeTheme.input} transition-all`}>
                                        <Palette size={20} className={activeTheme.accent} />
                                    </button>
                                    {showThemeMenu && (
                                        <div className={`${clayCardClass} absolute top-full right-0 mt-4 w-48 p-2 z-[60] overflow-hidden`}>
                                            <ThemeButton mode="light" icon={Sun} label="Claro" />
                                            <ThemeButton mode="dark" icon={Moon} label="Oscuro" />
                                            <ThemeButton mode="emerald" icon={Leaf} label="Esmeralda" />
                                        </div>
                                    )}
                                </div>

                                <button onClick={() => setShowChat(true)} className={`${clayButtonClass} py-2 px-6 text-sm rounded-full flex items-center gap-2`}>
                                    <Sparkles size={16} /> Consultor AI ✨
                                </button>
                            </div>

                            <button className={`md:hidden p-2 ${activeTheme.accent}`} onClick={() => setIsMenuOpen(!isMenuOpen)}>
                                {isMenuOpen ? <X /> : <Menu />}
                            </button>
                        </div>
                    </nav>

                    {/* Hero Section */}
                    <section className="relative pt-40 pb-20 overflow-hidden">
                        <div className={`absolute top-20 -right-20 w-96 h-96 ${activeTheme.blob1} rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob`}></div>
                        <div className={`absolute -bottom-20 -left-20 w-96 h-96 ${activeTheme.blob2} rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000`}></div>

                        <div className="container mx-auto px-6 relative z-10 text-center lg:text-left">
                            <div className="flex flex-col lg:flex-row items-center gap-16">
                                <div className="lg:w-1/2 space-y-8">
                                    <div className={`inline-flex px-6 py-2 bg-white border-2 border-blue-100 rounded-full ${activeTheme.accent} text-sm font-black uppercase tracking-wider shadow-sm`}>
                                        Certificación & Calidad
                                    </div>
                                    <h1 className="text-5xl md:text-7xl font-black leading-[1.1]">
                                        Excelencia en <span className={activeTheme.accent}>Calidad</span> Adaptable ✨
                                    </h1>
                                    <p className={`text-xl ${activeTheme.subtext} max-w-xl mx-auto lg:mx-0 font-medium leading-relaxed`}>
                                        Expertos en ISO 9001. Descubre una experiencia de usuario única con temas personalizados y consultoría inteligente con salida Markdown.
                                    </p>
                                    <div className="flex flex-col sm:flex-row justify-center lg:justify-start gap-6">
                                        <button className={clayButtonClass} onClick={() => document.getElementById('ia-tools').scrollIntoView({behavior: 'smooth'})}>
                                            Explorar IA ✨
                                        </button>
                                        <button className={`${clayCardClass} px-8 py-4 font-bold ${activeTheme.accent} flex items-center justify-center`}>
                                            Nuestra Misión
                                        </button>
                                    </div>
                                </div>
                                <div className="lg:w-1/2">
                                    <div className={`${clayCardClass} p-4 rotate-3 hover:rotate-0 transition-transform duration-500`}>
                                        <div className={`bg-gradient-to-br ${theme === 'emerald' ? 'from-emerald-500 to-teal-600' : 'from-blue-500 to-indigo-600'} rounded-[32px] h-[400px] flex flex-col items-center justify-center text-white relative overflow-hidden shadow-inner`}>
                                            <ShieldCheck className="w-40 h-40 mb-6 drop-shadow-2xl animate-pulse" />
                                            <h3 className="text-4xl font-black mb-2">ISO 9001:2015</h3>
                                            <p className="font-bold opacity-80 uppercase tracking-widest">Acreditación Global</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    {/* IA Center ✨ */}
                    <section id="ia-tools" className={`py-24 ${activeTheme.toolBg} transition-colors`}>
                        <div className="container mx-auto px-6">
                            <div className="text-center mb-16">
                                <h2 className="text-4xl font-black mb-4">IA Certification Center ✨</h2>
                                <p className={`${activeTheme.subtext} font-bold max-w-2xl mx-auto`}>Automatiza los procesos con salida formateada en tiempo real.</p>
                            </div>

                            <div className="grid md:grid-cols-2 gap-8">
                                <div className={`${clayCardClass} p-8`}>
                                    <div className="flex items-center gap-4 mb-4">
                                        <div className={`p-3 rounded-2xl ${theme === 'dark' ? 'bg-red-900/50 text-red-400' : 'bg-red-100 text-red-600'}`}>
                                            <AlertTriangle size={24} />
                                        </div>
                                        <h3 className="text-xl font-black">Analizador de Riesgos ✨</h3>
                                    </div>
                                    <textarea 
                                        className={`w-full ${activeTheme.input} rounded-2xl p-4 text-sm mb-4 min-h-[100px] shadow-inner`}
                                        placeholder="Describe un proceso (ej: Logística de transporte)..."
                                        onChange={(e) => setToolInput(e.target.value)}
                                    />
                                    <button onClick={() => handleToolAction('risk')} disabled={isToolLoading} className={`${clayButtonClass} w-full py-3 bg-red-600`}>
                                        {isToolLoading && activeTool === 'risk' ? <RefreshCw className="animate-spin" size={18} /> : "Identificar Riesgos ✨"}
                                    </button>
                                </div>

                                <div className={`${clayCardClass} p-8`}>
                                    <div className="flex items-center gap-4 mb-4">
                                        <div className={`p-3 rounded-2xl ${theme === 'dark' ? 'bg-amber-900/50 text-amber-400' : 'bg-amber-100 text-amber-600'}`}>
                                            <FileText size={24} />
                                        </div>
                                        <h3 className="text-xl font-black">Redactor de Política ✨</h3>
                                    </div>
                                    <textarea 
                                        className={`w-full ${activeTheme.input} rounded-2xl p-4 text-sm mb-4 min-h-[100px] shadow-inner`}
                                        placeholder="Valores: Integridad, puntualidad y enfoque al cliente..."
                                        onChange={(e) => setToolInput(e.target.value)}
                                    />
                                    <button onClick={() => handleToolAction('policy')} disabled={isToolLoading} className={`${clayButtonClass} w-full py-3 bg-amber-600`}>
                                        {isToolLoading && activeTool === 'policy' ? <RefreshCw className="animate-spin" size={18} /> : "Redactar Política ✨"}
                                    </button>
                                </div>
                            </div>

                            {toolResult && (
                                <div className={`mt-10 p-8 ${clayCardClass} animate-in fade-in slide-in-from-bottom-4`}>
                                    <div className="flex justify-between items-center mb-6 border-b-2 border-current border-opacity-5 pb-4">
                                        <h4 className="text-sm font-black uppercase tracking-widest opacity-40 flex items-center gap-2">
                                            <Sparkles size={14} /> Informe Generado con IA
                                        </h4>
                                        <button onClick={() => setToolResult("")} className="opacity-40 hover:opacity-100 hover:text-red-500 transition-all">
                                            <X size={20}/>
                                        </button>
                                    </div>
                                    <MarkdownRenderer content={toolResult} themeClass={activeTheme.text} />
                                </div>
                            )}
                        </div>
                    </section>

                    {/* Floating AI Chat */}
                    {!showChat ? (
                        <button 
                            onClick={() => setShowChat(true)}
                            className={`fixed bottom-8 right-8 w-16 h-16 ${activeTheme.accentBg} text-white rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-40`}
                        >
                            <Sparkles size={28} />
                        </button>
                    ) : (
                        <div className={`${clayCardClass} fixed bottom-8 right-8 w-[350px] md:w-[450px] h-[600px] flex flex-col z-50 overflow-hidden`}>
                            <div className={`${activeTheme.accentBg} p-5 flex justify-between items-center text-white`}>
                                <div className="flex items-center gap-3">
                                    <div className="bg-white/20 p-2 rounded-xl">
                                        <Sparkles size={18} />
                                    </div>
                                    <div>
                                        <h3 className="font-black text-sm">Consultoría QCC ✨</h3>
                                        <p className="text-[10px] font-bold opacity-70 uppercase tracking-widest">IA Formatted Mode</p>
                                    </div>
                                </div>
                                <button onClick={() => setShowChat(false)} className="hover:bg-white/10 p-1 rounded-lg"><X size={24} /></button>
                            </div>
                            <div className={`flex-1 overflow-y-auto p-4 space-y-4 ${theme === 'dark' ? 'bg-slate-900' : 'bg-slate-50'}`}>
                                {chatMessages.map((msg, i) => (
                                    <div key={i} className={`flex ${msg.role === 'user' ? 'justify-end' : 'justify-start'}`}>
                                        <div className={`max-w-[90%] p-4 rounded-3xl text-sm font-medium shadow-sm border-2 ${
                                            msg.role === 'user' 
                                            ? activeTheme.accentBg + ' text-white border-transparent' 
                                            : (theme === 'dark' ? 'bg-slate-800 text-white border-slate-700' : 'bg-white text-slate-700 border-white')
                                        }`}>
                                            <MarkdownRenderer content={msg.text} themeClass="" />
                                        </div>
                                    </div>
                                ))}
                                {isTyping && (
                                    <div className="flex justify-start">
                                         <div className={`${theme === 'dark' ? 'bg-slate-800' : 'bg-white'} p-3 rounded-2xl flex gap-1`}>
                                                <div className="w-2 h-2 bg-current opacity-40 rounded-full animate-bounce"></div>
                                                <div className="w-2 h-2 bg-current opacity-40 rounded-full animate-bounce delay-75"></div>
                                                <div className="w-2 h-2 bg-current opacity-40 rounded-full animate-bounce delay-150"></div>
                                         </div>
                                    </div>
                                )}
                                <div ref={chatEndRef} />
                            </div>
                            <form onSubmit={handleSendMessage} className={`p-4 ${theme === 'dark' ? 'bg-slate-800' : 'bg-white'} border-t flex gap-2`}>
                                <input 
                                    value={chatInput}
                                    onChange={(e) => setChatInput(e.target.value)}
                                    className={`flex-1 ${activeTheme.input} border-2 rounded-2xl px-4 py-2 text-sm outline-none font-medium`}
                                    placeholder="Pregunta sobre auditorías..."
                                />
                                <button type="submit" className={`${activeTheme.accentBg} text-white p-2 rounded-xl active:scale-90 transition-all`}>
                                    <Send size={18} />
                                </button>
                            </form>
                        </div>
                    )}
                </div>
            );
        };

        const root = ReactDOM.createRoot(document.getElementById('root'));
        root.render(<App />);
    </script>
    @endverbatim
</body>
</html>
