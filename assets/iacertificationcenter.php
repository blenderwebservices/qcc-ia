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
