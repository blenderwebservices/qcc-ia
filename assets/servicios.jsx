import { motion } from "motion/react";
import {
  Award,
  BookOpen,
  CheckCircle,
  ChevronRight,
  ClipboardCheck,
  Globe,
  Mail,
  Phone,
  Shield,
  TrendingUp,
  Users,
} from "lucide-react";
import { Button } from "@/components/ui/button.tsx";
import { Badge } from "@/components/ui/badge.tsx";
import { Card, CardContent } from "@/components/ui/card.tsx";

// ─── Data ────────────────────────────────────────────────────────────────────

const services = [
  {
    icon: BookOpen,
    title: "Capacitación",
    tag: "Desarrollo de competencias",
    description:
      "Transmisión sistemática de conocimientos y fortalecimiento de competencias técnicas, operativas y normativas. Preparamos a su personal para cumplir requisitos regulatorios y elevar los estándares de calidad en todos sus procesos.",
    color: "from-blue-600/10 to-blue-600/5",
    accent: "bg-blue-600",
    img: "https://images.unsplash.com/photo-1758691736082-b69a65770026?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=800",
  },
  {
    icon: ClipboardCheck,
    title: "Auditoría",
    tag: "Evaluación independiente",
    description:
      "Evaluación estructurada, independiente y documentada que verifica la conformidad de procesos, sistemas o servicios. Identificamos oportunidades de mejora y preparamos a su organización para la certificación.",
    color: "from-amber-500/10 to-amber-500/5",
    accent: "bg-amber-500",
    img: "https://images.unsplash.com/photo-1551135049-8a33b5883817?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=800",
  },
  {
    icon: Award,
    title: "Certificación",
    tag: "Reconocimiento formal",
    description:
      "Confirmamos que su sistema de gestión, producto o servicio cumple con normas específicas (ISO, NOM u otras). Un reconocimiento que aporta confianza al mercado, mejora su reputación y abre nuevas oportunidades comerciales.",
    color: "from-emerald-600/10 to-emerald-600/5",
    accent: "bg-emerald-600",
    img: "https://images.unsplash.com/photo-1559588501-59a118c47e59?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=800",
  },
];

const certProcess = [
  { num: "01", label: "Ingreso de solicitud" },
  { num: "02", label: "Evaluación documental" },
  { num: "03", label: "Preauditoría" },
  { num: "04", label: "Auditoría de certificación" },
  { num: "05", label: "Dictaminación" },
  { num: "06", label: "Certificación" },
  { num: "07", label: "Seguimiento anual" },
];

const auditTypes = [
  {
    num: "01",
    title: "Auditoría de Primera Parte",
    desc: "Herramienta interna para que las organizaciones evalúen su propia conformidad y eficacia en sus sistemas de gestión. Facilita la mejora continua informada.",
  },
  {
    num: "02",
    title: "Auditoría de Segunda Parte",
    desc: "Realizadas por un cliente u organización interesada, evaluando a sus proveedores conforme a requisitos contractuales y normativos de calidad establecidos.",
  },
  {
    num: "03",
    title: "Auditoría de Tercera Parte",
    desc: "Ejecutadas por organismos independientes para certificar y confirmar la conformidad con normas internacionales. Otorgan confianza objetiva a todas las partes interesadas.",
  },
];

const benefits = [
  {
    audience: "Nacional",
    icon: Shield,
    items: [
      "Mejora el sistema de calidad industrial",
      "Protege a los consumidores",
      "Prestigio internacional de productos nacionales",
      "Transparencia en el mercado",
    ],
  },
  {
    audience: "Internacional",
    icon: Globe,
    items: [
      "Facilita los intercambios comerciales",
      "Protege exportaciones contra barreras técnicas",
      "Garantiza la calidad del consumo",
      "Simplifica la confianza entre mercados",
    ],
  },
  {
    audience: "Industria",
    icon: TrendingUp,
    items: [
      "Demuestra cumplimiento de requisitos técnicos",
      "Cumple obligaciones legales y contractuales",
      "Fortalece la competitividad",
      "Impulsa la mejora del desempeño",
    ],
  },
  {
    audience: "Consumidores",
    icon: Users,
    items: [
      "Protege contra productos de mala calidad",
      "Asegura cumplimiento de estándares",
      "Genera confianza en la adquisición",
      "Respalda decisiones de compra informadas",
    ],
  },
];

// ─── Animation helpers ────────────────────────────────────────────────────────

const fadeUp = {
  hidden: { opacity: 0, y: 28 },
  show: (i: number) => ({
    opacity: 1,
    y: 0,
    transition: { duration: 0.55, delay: i * 0.1, ease: [0.25, 0.1, 0.25, 1] as const },
  }),
};

// ─── Sections ────────────────────────────────────────────────────────────────

function Navbar() {
  return (
    <header className="fixed top-0 inset-x-0 z-50 bg-white/80 backdrop-blur-md border-b border-border">
      <div className="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        <span className="font-bold text-xl tracking-tight text-primary">
          Q<span className="text-accent-foreground">&</span>CC
        </span>
        <nav className="hidden md:flex items-center gap-8 text-sm font-medium text-muted-foreground">
          <a href="#servicios" className="hover:text-foreground transition-colors cursor-pointer">Servicios</a>
          <a href="#proceso" className="hover:text-foreground transition-colors cursor-pointer">Proceso</a>
          <a href="#beneficios" className="hover:text-foreground transition-colors cursor-pointer">Beneficios</a>
          <a href="#auditorias" className="hover:text-foreground transition-colors cursor-pointer">Auditorías</a>
        </nav>
        <Button size="sm" className="cursor-pointer">
          Contáctanos
        </Button>
      </div>
    </header>
  );
}

function Hero() {
  return (
    <section className="relative min-h-screen flex items-center overflow-hidden bg-primary">
      {/* Background image with overlay */}
      <div
        className="absolute inset-0 bg-cover bg-center opacity-20"
        style={{ backgroundImage: `url(https://images.unsplash.com/photo-1758518730037-a16581a040e8?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=1600)` }}
      />
      <div className="absolute inset-0 bg-gradient-to-br from-primary/90 via-primary/80 to-[oklch(0.22_0.10_260)]/90" />

      <div className="relative z-10 max-w-7xl mx-auto px-6 pt-24 pb-16 grid md:grid-cols-2 gap-12 items-center">
        <div>
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6 }}
          >
            <Badge className="mb-5 bg-accent text-accent-foreground font-semibold tracking-wide">
              Quality & Competitive College
            </Badge>
          </motion.div>
          <motion.h1
            className="text-5xl md:text-6xl font-bold text-white leading-[1.1] text-balance mb-6"
            initial={{ opacity: 0, y: 24 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.65, delay: 0.1 }}
          >
            Soluciones para cada etapa de su proyecto
          </motion.h1>
          <motion.p
            className="text-lg text-blue-100/80 leading-relaxed mb-8 max-w-lg"
            initial={{ opacity: 0, y: 24 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.65, delay: 0.2 }}
          >
            Capacitación, Auditoría y Certificación bajo normas ISO y NOM. Acompañamos a su organización desde el diagnóstico hasta el reconocimiento formal.
          </motion.p>
          <motion.div
            className="flex flex-wrap gap-4"
            initial={{ opacity: 0, y: 24 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.65, delay: 0.3 }}
          >
            <Button size="lg" className="bg-accent text-accent-foreground hover:bg-accent/90 font-semibold cursor-pointer">
              Conocer servicios
              <ChevronRight className="ml-1 h-4 w-4" />
            </Button>
            <Button size="lg" variant="secondary" className="border border-white/20 bg-white/10 text-white hover:bg-white/20 cursor-pointer">
              Iniciar certificación
            </Button>
          </motion.div>
        </div>

        {/* Stats */}
        <motion.div
          className="grid grid-cols-2 gap-4"
          initial={{ opacity: 0, x: 30 }}
          animate={{ opacity: 1, x: 0 }}
          transition={{ duration: 0.7, delay: 0.35 }}
        >
          {[
            { val: "ISO", sub: "Normas internacionales", icon: Award },
            { val: "NOM", sub: "Normas oficiales mexicanas", icon: Shield },
            { val: "3", sub: "Tipos de auditoría disponibles", icon: ClipboardCheck },
            { val: "7", sub: "Etapas del proceso de certificación", icon: CheckCircle },
          ].map(({ val, sub, icon: Icon }) => (
            <div key={val} className="rounded-2xl bg-white/10 border border-white/10 p-6 backdrop-blur-sm">
              <Icon className="h-6 w-6 text-accent mb-3" />
              <div className="text-3xl font-bold text-white mb-1">{val}</div>
              <div className="text-xs text-blue-100/70 leading-snug">{sub}</div>
            </div>
          ))}
        </motion.div>
      </div>
    </section>
  );
}

function Services() {
  return (
    <section id="servicios" className="py-24 bg-background">
      <div className="max-w-7xl mx-auto px-6">
        <motion.div
          className="text-center mb-16"
          variants={fadeUp}
          initial="hidden"
          whileInView="show"
          custom={0}
          viewport={{ once: true }}
        >
          <Badge variant="secondary" className="mb-4">Nuestros Servicios Clave</Badge>
          <h2 className="text-4xl font-bold text-foreground mb-4">
            Una solución para cada necesidad
          </h2>
          <p className="text-muted-foreground max-w-xl mx-auto text-lg">
            Ofrecemos servicios integrales diseñados para fortalecer la calidad y competitividad de su organización.
          </p>
        </motion.div>

        <div className="grid md:grid-cols-3 gap-8">
          {services.map((s, i) => (
            <motion.div
              key={s.title}
              variants={fadeUp}
              initial="hidden"
              whileInView="show"
              custom={i + 1}
              viewport={{ once: true }}
            >
              <Card className="overflow-hidden h-full border-border hover:shadow-lg transition-shadow duration-300 pt-0">
                <div className="relative h-48 overflow-hidden">
                  <img
                    src={s.img}
                    alt={s.title}
                    className="w-full h-full object-cover"
                  />
                  <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent" />
                  <div className="absolute bottom-4 left-4 flex items-center gap-2">
                    <div className={`${s.accent} p-2 rounded-lg`}>
                      <s.icon className="h-4 w-4 text-white" />
                    </div>
                    <span className="text-white font-bold text-lg">{s.title}</span>
                  </div>
                </div>
                <CardContent className="pt-5 pb-6">
                  <Badge variant="secondary" className="mb-3 text-xs">{s.tag}</Badge>
                  <p className="text-muted-foreground text-sm leading-relaxed">{s.description}</p>
                </CardContent>
              </Card>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}

function CertProcess() {
  return (
    <section id="proceso" className="py-24 bg-primary text-white">
      <div className="max-w-7xl mx-auto px-6">
        <motion.div
          className="text-center mb-16"
          variants={fadeUp}
          initial="hidden"
          whileInView="show"
          custom={0}
          viewport={{ once: true }}
        >
          <Badge className="mb-4 bg-accent text-accent-foreground">Proceso de Certificación</Badge>
          <h2 className="text-4xl font-bold mb-4">
            Un camino claro hacia la certificación
          </h2>
          <p className="text-blue-100/70 max-w-xl mx-auto text-lg">
            Proceso estructurado y eficiente, diseñado para agregar valor en cada etapa del camino.
          </p>
        </motion.div>

        <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
          {certProcess.map((step, i) => (
            <motion.div
              key={step.num}
              className="relative bg-white/10 backdrop-blur-sm border border-white/10 rounded-2xl p-6 hover:bg-white/15 transition-colors"
              variants={fadeUp}
              initial="hidden"
              whileInView="show"
              custom={i * 0.5 + 1}
              viewport={{ once: true }}
            >
              <span className="text-5xl font-bold text-white/10 leading-none block mb-3">{step.num}</span>
              <p className="text-white font-semibold text-sm leading-snug">{step.label}</p>
              {i < certProcess.length - 1 && (
                <ChevronRight className="hidden lg:block absolute -right-3 top-1/2 -translate-y-1/2 h-5 w-5 text-white/30 z-10" />
              )}
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}

function Benefits() {
  return (
    <section id="beneficios" className="py-24 bg-background">
      <div className="max-w-7xl mx-auto px-6">
        <motion.div
          className="text-center mb-16"
          variants={fadeUp}
          initial="hidden"
          whileInView="show"
          custom={0}
          viewport={{ once: true }}
        >
          <Badge variant="secondary" className="mb-4">Beneficios de la Certificación</Badge>
          <h2 className="text-4xl font-bold text-foreground mb-4">
            Valor tangible para cada actor
          </h2>
          <p className="text-muted-foreground max-w-xl mx-auto text-lg">
            La certificación genera confianza y ventajas competitivas en todos los niveles del ecosistema empresarial.
          </p>
        </motion.div>

        <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
          {benefits.map((b, i) => (
            <motion.div
              key={b.audience}
              className="bg-card border border-border rounded-2xl p-6 hover:shadow-md transition-shadow"
              variants={fadeUp}
              initial="hidden"
              whileInView="show"
              custom={i + 1}
              viewport={{ once: true }}
            >
              <div className="bg-primary/10 w-11 h-11 rounded-xl flex items-center justify-center mb-4">
                <b.icon className="h-5 w-5 text-primary" />
              </div>
              <h3 className="font-bold text-foreground mb-3">Nivel {b.audience}</h3>
              <ul className="space-y-2">
                {b.items.map((item) => (
                  <li key={item} className="flex items-start gap-2 text-sm text-muted-foreground">
                    <CheckCircle className="h-4 w-4 text-emerald-500 shrink-0 mt-0.5" />
                    <span>{item}</span>
                  </li>
                ))}
              </ul>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}

function AuditSection() {
  return (
    <section id="auditorias" className="py-24 bg-muted">
      <div className="max-w-7xl mx-auto px-6">
        <div className="grid md:grid-cols-2 gap-16 items-center mb-20">
          <motion.div
            variants={fadeUp}
            initial="hidden"
            whileInView="show"
            custom={0}
            viewport={{ once: true }}
          >
            <Badge variant="secondary" className="mb-4">Auditorías Externas</Badge>
            <h2 className="text-4xl font-bold text-foreground mb-5">
              Evaluación objetiva e independiente
            </h2>
            <p className="text-muted-foreground leading-relaxed mb-4">
              En <strong>Quality and Competitive College</strong>, realizamos auditorías externas conforme a las normas ISO para evaluar de manera objetiva e independiente si su organización cumple con los requisitos de su sistema de gestión.
            </p>
            <p className="text-muted-foreground leading-relaxed">
              Estas auditorías fortalecen la credibilidad de su empresa, permiten detectar áreas de mejora, aseguran el cumplimiento normativo y son clave para obtener o mantener la certificación ISO.
            </p>
          </motion.div>
          <motion.div
            variants={fadeUp}
            initial="hidden"
            whileInView="show"
            custom={1}
            viewport={{ once: true }}
          >
            <img
              src="https://images.unsplash.com/photo-1758518729685-f88df7890776?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=800"
              alt="Equipo de auditoría"
              className="rounded-2xl object-cover w-full h-72 shadow-lg"
            />
          </motion.div>
        </div>

        <div className="grid md:grid-cols-3 gap-6">
          {auditTypes.map((a, i) => (
            <motion.div
              key={a.num}
              className="bg-card border border-border rounded-2xl p-7 hover:shadow-md transition-shadow"
              variants={fadeUp}
              initial="hidden"
              whileInView="show"
              custom={i + 1}
              viewport={{ once: true }}
            >
              <span className="text-5xl font-bold text-primary/10 block mb-4 leading-none">{a.num}</span>
              <h3 className="font-bold text-foreground mb-3">{a.title}</h3>
              <p className="text-muted-foreground text-sm leading-relaxed">{a.desc}</p>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}

function AuditBenefits() {
  return (
    <section className="py-24 bg-background">
      <div className="max-w-7xl mx-auto px-6">
        <motion.div
          className="text-center mb-14"
          variants={fadeUp}
          initial="hidden"
          whileInView="show"
          custom={0}
          viewport={{ once: true }}
        >
          <Badge variant="secondary" className="mb-4">Beneficios de la Auditoría</Badge>
          <h2 className="text-4xl font-bold text-foreground mb-4">Lo que aportan nuestras auditorías</h2>
        </motion.div>

        <div className="grid md:grid-cols-3 gap-8">
          {[
            {
              title: "Para su organización",
              items: [
                "Información clave sobre cómo su sistema de gestión contribuye a sus objetivos",
                "Identificación de desviaciones reales o potenciales",
                "Oportunidades de mejora para fortalecer eficiencia y competitividad",
              ],
            },
            {
              title: "Para sus clientes",
              items: [
                "Apoyo integral durante todo el proceso de auditoría",
                "Garantía de que productos y servicios se entregan conforme a un sistema alineado con requisitos legales",
                "Confianza en la gestión de su proveedor",
              ],
            },
            {
              title: "Para el mercado",
              items: [
                "Credibilidad del proceso de certificación de terceras partes",
                "Transparencia frente a partes interesadas, proveedores y sociedad",
                "Fortalecimiento del compromiso con la mejora continua",
              ],
            },
          ].map((col, i) => (
            <motion.div
              key={col.title}
              className="bg-card border border-border rounded-2xl p-7 hover:shadow-md transition-shadow"
              variants={fadeUp}
              initial="hidden"
              whileInView="show"
              custom={i + 1}
              viewport={{ once: true }}
            >
              <h3 className="font-bold text-foreground mb-5">{col.title}</h3>
              <ul className="space-y-3">
                {col.items.map((item) => (
                  <li key={item} className="flex items-start gap-3 text-sm text-muted-foreground">
                    <CheckCircle className="h-4 w-4 text-primary shrink-0 mt-0.5" />
                    <span>{item}</span>
                  </li>
                ))}
              </ul>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}

function CTA() {
  return (
    <section className="py-24 bg-primary relative overflow-hidden">
      <div
        className="absolute inset-0 bg-cover bg-center opacity-10"
        style={{ backgroundImage: `url(https://images.unsplash.com/photo-1758518730151-cf64fddb4f0a?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=1600)` }}
      />
      <div className="relative z-10 max-w-3xl mx-auto px-6 text-center">
        <motion.div
          variants={fadeUp}
          initial="hidden"
          whileInView="show"
          custom={0}
          viewport={{ once: true }}
        >
          <Badge className="mb-5 bg-accent text-accent-foreground">Comience hoy</Badge>
          <h2 className="text-4xl md:text-5xl font-bold text-white mb-6 text-balance">
            Lleve su organización al siguiente nivel
          </h2>
          <p className="text-blue-100/70 text-lg mb-10 leading-relaxed">
            Contáctenos y nuestro equipo le guiará a través del proceso más adecuado para sus objetivos de certificación, auditoría o capacitación.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Button size="lg" className="bg-accent text-accent-foreground hover:bg-accent/90 font-semibold cursor-pointer">
              <Mail className="h-4 w-4 mr-2" />
              Enviar solicitud
            </Button>
            <Button size="lg" variant="secondary" className="border border-white/20 bg-white/10 text-white hover:bg-white/20 cursor-pointer">
              <Phone className="h-4 w-4 mr-2" />
              Llamar ahora
            </Button>
          </div>
        </motion.div>
      </div>
    </section>
  );
}

function Footer() {
  return (
    <footer className="bg-[oklch(0.12_0.03_255)] text-white/60 py-12">
      <div className="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6">
        <div>
          <span className="font-bold text-xl text-white tracking-tight">Q&CC</span>
          <p className="text-sm mt-1">Quality and Competitive College</p>
        </div>
        <p className="text-xs text-center">
          © {new Date().getFullYear()} Quality and Competitive College. Todos los derechos reservados.
        </p>
        <div className="flex gap-6 text-sm">
          <a href="https://www.qcc.com.mx" target="_blank" rel="noopener noreferrer" className="hover:text-white transition-colors cursor-pointer">
            qcc.com.mx
          </a>
        </div>
      </div>
    </footer>
  );
}

// ─── Page ─────────────────────────────────────────────────────────────────────

export default function Index() {
  return (
    <div className="min-h-screen">
      <Navbar />
      <Hero />
      <Services />
      <CertProcess />
      <Benefits />
      <AuditSection />
      <AuditBenefits />
      <CTA />
      <Footer />
    </div>
  );
}
