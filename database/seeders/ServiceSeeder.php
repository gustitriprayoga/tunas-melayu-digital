<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::truncate();

        $services = [
            [
                'title' => 'Web App Development',
                'icon' => 'heroicon-o-code-bracket-square',
                'short_description' => 'Membangun aplikasi web skala enterprise dengan Laravel & React yang cepat, aman, dan scalable.',
                'full_content' => '
                    <h2 style="text-align: center;">Pengembangan Aplikasi Web Enterprise</h2>
                    <p style="text-align: center;"><em>Solusi digital yang mengubah cara bisnis Anda beroperasi</em></p>
                    
                    <p>Kami menghadirkan <strong>solusi aplikasi web yang dirancang khusus</strong> untuk memenuhi kebutuhan bisnis modern. Dengan pengalaman bertahun-tahun dalam industri teknologi, tim kami siap mengubah visi digital Anda menjadi kenyataan yang powerful dan scalable.</p>
                    
                    <hr>
                    
                    <h3 style="text-align: center;">🚀 Teknologi yang Kami Gunakan</h3>
                    <p style="text-align: center;">Stack teknologi terkini untuk performa maksimal</p>
                    
                    <ul>
                        <li><strong>Backend:</strong> Laravel 11, Node.js, Python Django</li>
                        <li><strong>Frontend:</strong> React.js, Vue.js, Next.js</li>
                        <li><strong>Database:</strong> MySQL, PostgreSQL, MongoDB, Redis</li>
                        <li><strong>API:</strong> RESTful API, GraphQL</li>
                        <li><strong>Cloud:</strong> AWS, Google Cloud, Azure</li>
                    </ul>
                    
                    <h3 style="text-align: center;">✨ Fitur Unggulan</h3>
                    
                    <ul>
                        <li><strong>Arsitektur Microservices</strong> - Scalable dan maintainable untuk pertumbuhan bisnis jangka panjang</li>
                        <li><strong>Real-time Synchronization</strong> - Data update secara instant dengan WebSocket technology</li>
                        <li><strong>Progressive Web App (PWA)</strong> - Pengalaman mobile-first yang seamless</li>
                        <li><strong>Multi-tenant Architecture</strong> - Perfect untuk SaaS applications</li>
                        <li><strong>Advanced Caching</strong> - Redis dan CDN untuk performa optimal</li>
                        <li><strong>API Documentation</strong> - Comprehensive docs dengan Swagger/OpenAPI</li>
                    </ul>
                    
                    <blockquote>
                        <p><em>"Kami tidak hanya membangun aplikasi, kami membangun solusi yang mengakselerasi pertumbuhan bisnis Anda."</em></p>
                    </blockquote>
                    
                    <h3>📋 Proses Pengembangan</h3>
                    <p>Metodologi Agile yang terbukti efektif:</p>
                    
                    <ol>
                        <li><strong>Discovery & Planning</strong> - Analisis mendalam kebutuhan bisnis dan teknis Anda</li>
                        <li><strong>Design & Prototyping</strong> - Wireframe dan mockup interaktif untuk visualisasi awal</li>
                        <li><strong>Development</strong> - Sprint-based development dengan review berkala</li>
                        <li><strong>Testing</strong> - Unit testing, integration testing, dan User Acceptance Testing</li>
                        <li><strong>Deployment</strong> - CI/CD pipeline untuk deployment yang smooth dan aman</li>
                        <li><strong>Maintenance</strong> - Monitoring 24/7 dan support berkelanjutan</li>
                    </ol>
                    
                    <h3 style="text-align: center;">📦 Yang Anda Dapatkan</h3>
                    
                    <ul>
                        <li>✅ Source code lengkap dengan dokumentasi detail</li>
                        <li>✅ Database schema dan migration files</li>
                        <li>✅ API documentation yang comprehensive</li>
                        <li>✅ User manual dan admin guide</li>
                        <li>✅ Deployment guide dan server configuration</li>
                        <li>✅ <strong>3 bulan free maintenance dan bug fixing</strong></li>
                        <li>✅ Training untuk tim internal Anda</li>
                    </ul>
                    
                    <p style="text-align: center;"><strong>Siap untuk transformasi digital?</strong></p>
                    <p style="text-align: center;">Hubungi kami sekarang untuk konsultasi gratis!</p>
                '
            ],
            [
                'title' => 'Mobile Applications',
                'icon' => 'heroicon-o-device-phone-mobile',
                'short_description' => 'Aplikasi Android & iOS native menggunakan Flutter dengan performa tinggi dan animasi halus.',
                'full_content' => '
                    <h2>Pengembangan Aplikasi Mobile Native</h2>
                    <p>Hadirkan bisnis Anda di genggaman pelanggan dengan aplikasi mobile yang powerful dan user-friendly. Kami mengembangkan aplikasi mobile yang tidak hanya cantik secara visual, tetapi juga optimal dalam performa dan pengalaman pengguna.</p>
                    
                    <h3>Platform & Teknologi</h3>
                    <ul>
                        <li><strong>Cross-Platform:</strong> Flutter, React Native</li>
                        <li><strong>Native iOS:</strong> Swift, SwiftUI</li>
                        <li><strong>Native Android:</strong> Kotlin, Jetpack Compose</li>
                        <li><strong>Backend Integration:</strong> Firebase, AWS Amplify, Custom API</li>
                    </ul>
                    
                    <h3>Fitur Aplikasi Mobile</h3>
                    <ul>
                        <li>Offline-first architecture dengan local database</li>
                        <li>Push notifications untuk engagement maksimal</li>
                        <li>In-app purchases dan payment gateway integration</li>
                        <li>Social media login (Google, Facebook, Apple)</li>
                        <li>Geolocation dan maps integration</li>
                        <li>Camera, gallery, dan media handling</li>
                        <li>Biometric authentication (fingerprint, face ID)</li>
                        <li>Deep linking dan universal links</li>
                    </ul>
                    
                    <h3>Keunggulan Kami</h3>
                    <ul>
                        <li>Single codebase untuk iOS dan Android (Flutter/React Native)</li>
                        <li>Native performance dengan smooth animations (60 FPS)</li>
                        <li>Material Design dan Human Interface Guidelines compliant</li>
                        <li>Optimized app size dan battery consumption</li>
                        <li>Comprehensive crash reporting dan analytics</li>
                    </ul>
                    
                    <h3>Proses Development</h3>
                    <ol>
                        <li><strong>Requirement Analysis:</strong> Memahami target user dan business goals</li>
                        <li><strong>UI/UX Design:</strong> Prototype interaktif dengan Figma</li>
                        <li><strong>Development:</strong> Iterative development dengan weekly demos</li>
                        <li><strong>Testing:</strong> Device testing, beta testing, dan performance testing</li>
                        <li><strong>App Store Submission:</strong> Bantuan publish ke Google Play dan App Store</li>
                        <li><strong>Post-Launch Support:</strong> Monitoring, updates, dan feature enhancements</li>
                    </ol>
                    
                    <h3>Yang Anda Dapatkan</h3>
                    <ul>
                        <li>Aplikasi siap publish di App Store dan Google Play</li>
                        <li>Source code dan dokumentasi lengkap</li>
                        <li>Design assets (icons, splash screens, app store screenshots)</li>
                        <li>Backend API dan admin panel (jika diperlukan)</li>
                        <li>App store optimization (ASO) guidance</li>
                        <li>6 bulan free updates dan bug fixes</li>
                    </ul>
                '
            ],
            [
                'title' => 'UI/UX Design',
                'icon' => 'heroicon-o-paint-brush',
                'short_description' => 'Perancangan antarmuka futuristik yang memanjakan mata user dan meningkatkan konversi penjualan.',
                'full_content' => '
                    <h2>UI/UX Design yang Mengkonversi</h2>
                    <p>Design bukan hanya soal estetika, tetapi tentang menciptakan pengalaman yang intuitif dan menyenangkan bagi pengguna. Kami menggabungkan prinsip psikologi user, data analytics, dan tren design terkini untuk menciptakan interface yang tidak hanya indah, tetapi juga efektif meningkatkan konversi bisnis Anda.</p>
                    
                    <h3>Layanan Design Kami</h3>
                    <ul>
                        <li><strong>User Research:</strong> User interviews, surveys, dan persona development</li>
                        <li><strong>Information Architecture:</strong> Sitemap dan user flow optimization</li>
                        <li><strong>Wireframing:</strong> Low-fidelity dan high-fidelity wireframes</li>
                        <li><strong>Visual Design:</strong> UI design dengan design system yang konsisten</li>
                        <li><strong>Prototyping:</strong> Interactive prototype untuk user testing</li>
                        <li><strong>Usability Testing:</strong> A/B testing dan user feedback analysis</li>
                    </ul>
                    
                    <h3>Design Tools & Metodologi</h3>
                    <ul>
                        <li><strong>Design Tools:</strong> Figma, Adobe XD, Sketch</li>
                        <li><strong>Prototyping:</strong> Figma, Principle, ProtoPie</li>
                        <li><strong>Collaboration:</strong> FigJam, Miro untuk brainstorming</li>
                        <li><strong>Methodology:</strong> Design Thinking, Lean UX, Atomic Design</li>
                    </ul>
                    
                    <h3>Prinsip Design Kami</h3>
                    <ul>
                        <li><strong>User-Centered:</strong> Selalu prioritaskan kebutuhan dan goals user</li>
                        <li><strong>Accessibility:</strong> WCAG compliant untuk inklusivitas maksimal</li>
                        <li><strong>Consistency:</strong> Design system yang kohesif di seluruh platform</li>
                        <li><strong>Simplicity:</strong> Interface yang clean dan mudah dipahami</li>
                        <li><strong>Feedback:</strong> Visual feedback untuk setiap user interaction</li>
                        <li><strong>Performance:</strong> Optimized assets untuk loading cepat</li>
                    </ul>
                    
                    <h3>Deliverables</h3>
                    <ul>
                        <li>Complete design files (Figma/Adobe XD)</li>
                        <li>Design system dan component library</li>
                        <li>Interactive prototype untuk user testing</li>
                        <li>Design specifications untuk developer</li>
                        <li>Exported assets (SVG, PNG, icons)</li>
                        <li>Style guide dan brand guidelines</li>
                        <li>Usability testing report dan recommendations</li>
                    </ul>
                    
                    <h3>Hasil yang Terukur</h3>
                    <ul>
                        <li>Peningkatan conversion rate hingga 200%</li>
                        <li>Pengurangan bounce rate signifikan</li>
                        <li>Peningkatan user engagement dan retention</li>
                        <li>Pengurangan customer support tickets</li>
                        <li>Peningkatan brand perception dan trust</li>
                    </ul>
                '
            ],
            [
                'title' => 'Cloud Infrastructure',
                'icon' => 'heroicon-o-cloud',
                'short_description' => 'Setup server AWS/DigitalOcean yang tangguh, auto-scaling, dan siap menangani jutaan request.',
                'full_content' => '
                    <h2>Cloud Infrastructure Management</h2>
                    <p>Infrastruktur cloud yang solid adalah fondasi dari aplikasi modern yang scalable dan reliable. Kami menyediakan solusi cloud infrastructure yang comprehensive, mulai dari setup awal hingga monitoring dan optimization berkelanjutan.</p>
                    
                    <h3>Cloud Platforms</h3>
                    <ul>
                        <li><strong>Amazon Web Services (AWS):</strong> EC2, RDS, S3, CloudFront, Lambda</li>
                        <li><strong>Google Cloud Platform (GCP):</strong> Compute Engine, Cloud SQL, Cloud Storage</li>
                        <li><strong>Microsoft Azure:</strong> Virtual Machines, Azure SQL, Blob Storage</li>
                        <li><strong>DigitalOcean:</strong> Droplets, Managed Databases, Spaces</li>
                        <li><strong>Vercel/Netlify:</strong> Untuk JAMstack applications</li>
                    </ul>
                    
                    <h3>Layanan Infrastructure</h3>
                    <ul>
                        <li><strong>Server Setup:</strong> Configuration dan hardening untuk security optimal</li>
                        <li><strong>Load Balancing:</strong> Distribusi traffic untuk high availability</li>
                        <li><strong>Auto-Scaling:</strong> Automatic resource scaling berdasarkan demand</li>
                        <li><strong>Database Management:</strong> Replication, backup, dan optimization</li>
                        <li><strong>CDN Integration:</strong> Content delivery untuk performa global</li>
                        <li><strong>SSL/TLS:</strong> Certificate management dan HTTPS enforcement</li>
                    </ul>
                    
                    <h3>DevOps & CI/CD</h3>
                    <ul>
                        <li><strong>Containerization:</strong> Docker dan Docker Compose</li>
                        <li><strong>Orchestration:</strong> Kubernetes untuk container management</li>
                        <li><strong>CI/CD Pipeline:</strong> GitHub Actions, GitLab CI, Jenkins</li>
                        <li><strong>Infrastructure as Code:</strong> Terraform, CloudFormation</li>
                        <li><strong>Configuration Management:</strong> Ansible, Chef, Puppet</li>
                    </ul>
                    
                    <h3>Monitoring & Security</h3>
                    <ul>
                        <li><strong>Monitoring:</strong> Prometheus, Grafana, CloudWatch</li>
                        <li><strong>Logging:</strong> ELK Stack (Elasticsearch, Logstash, Kibana)</li>
                        <li><strong>Alerting:</strong> PagerDuty, Slack integration untuk incident response</li>
                        <li><strong>Security:</strong> WAF, DDoS protection, intrusion detection</li>
                        <li><strong>Backup:</strong> Automated backup dengan disaster recovery plan</li>
                    </ul>
                    
                    <h3>Keunggulan Solusi Kami</h3>
                    <ul>
                        <li>99.9% uptime guarantee dengan SLA</li>
                        <li>Auto-scaling untuk handle traffic spikes</li>
                        <li>Multi-region deployment untuk disaster recovery</li>
                        <li>Cost optimization untuk efisiensi budget</li>
                        <li>24/7 monitoring dan incident response</li>
                        <li>Regular security audits dan updates</li>
                    </ul>
                    
                    <h3>Deliverables</h3>
                    <ul>
                        <li>Fully configured cloud infrastructure</li>
                        <li>Infrastructure documentation dan architecture diagram</li>
                        <li>CI/CD pipeline setup</li>
                        <li>Monitoring dashboard dan alerting rules</li>
                        <li>Backup dan disaster recovery procedures</li>
                        <li>Security hardening checklist</li>
                        <li>Cost optimization report</li>
                        <li>3 bulan managed services included</li>
                    </ul>
                '
            ],
            [
                'title' => 'Cyber Security',
                'icon' => 'heroicon-o-shield-check',
                'short_description' => 'Audit keamanan sistem dan implementasi proteksi berlapis untuk data sensitif perusahaan Anda.',
                'full_content' => '
                    <h2>Cyber Security Solutions</h2>
                    <p>Di era digital, keamanan bukan lagi optional tetapi keharusan. Kami menyediakan layanan cyber security comprehensive untuk melindungi aset digital Anda dari ancaman cyber yang terus berkembang. Tim security expert kami siap mengamankan infrastruktur, aplikasi, dan data bisnis Anda.</p>
                    
                    <h3>Layanan Security Kami</h3>
                    <ul>
                        <li><strong>Security Audit:</strong> Comprehensive assessment terhadap sistem dan aplikasi</li>
                        <li><strong>Penetration Testing:</strong> Ethical hacking untuk menemukan vulnerabilities</li>
                        <li><strong>Vulnerability Assessment:</strong> Scanning dan analysis kelemahan sistem</li>
                        <li><strong>Security Architecture:</strong> Design sistem dengan security-first approach</li>
                        <li><strong>Incident Response:</strong> Rapid response untuk security breaches</li>
                        <li><strong>Security Training:</strong> Employee awareness dan best practices</li>
                    </ul>
                    
                    <h3>Area Proteksi</h3>
                    <ul>
                        <li><strong>Application Security:</strong> OWASP Top 10 mitigation, secure coding practices</li>
                        <li><strong>Network Security:</strong> Firewall, IDS/IPS, VPN configuration</li>
                        <li><strong>Data Security:</strong> Encryption at rest dan in transit, data loss prevention</li>
                        <li><strong>Identity & Access:</strong> Multi-factor authentication, role-based access control</li>
                        <li><strong>Cloud Security:</strong> AWS/GCP/Azure security best practices</li>
                        <li><strong>API Security:</strong> OAuth, JWT, rate limiting, API gateway</li>
                    </ul>
                    
                    <h3>Security Tools & Technologies</h3>
                    <ul>
                        <li><strong>Scanning:</strong> Nessus, OpenVAS, Qualys</li>
                        <li><strong>Penetration Testing:</strong> Metasploit, Burp Suite, OWASP ZAP</li>
                        <li><strong>SIEM:</strong> Splunk, ELK Stack untuk security monitoring</li>
                        <li><strong>WAF:</strong> Cloudflare, AWS WAF, ModSecurity</li>
                        <li><strong>Encryption:</strong> SSL/TLS, AES-256, RSA</li>
                    </ul>
                    
                    <h3>Compliance & Standards</h3>
                    <ul>
                        <li>ISO 27001 Information Security Management</li>
                        <li>PCI DSS untuk payment card industry</li>
                        <li>GDPR compliance untuk data privacy</li>
                        <li>HIPAA untuk healthcare data</li>
                        <li>SOC 2 Type II certification support</li>
                    </ul>
                    
                    <h3>Security Implementation</h3>
                    <ol>
                        <li><strong>Assessment:</strong> Identify assets, threats, dan vulnerabilities</li>
                        <li><strong>Planning:</strong> Develop security strategy dan roadmap</li>
                        <li><strong>Implementation:</strong> Deploy security controls dan tools</li>
                        <li><strong>Testing:</strong> Penetration testing dan vulnerability scanning</li>
                        <li><strong>Monitoring:</strong> 24/7 security monitoring dan threat detection</li>
                        <li><strong>Response:</strong> Incident response plan dan disaster recovery</li>
                    </ol>
                    
                    <h3>Deliverables</h3>
                    <ul>
                        <li>Comprehensive security audit report</li>
                        <li>Penetration testing report dengan remediation steps</li>
                        <li>Security architecture documentation</li>
                        <li>Implemented security controls dan configurations</li>
                        <li>Security policies dan procedures</li>
                        <li>Incident response playbook</li>
                        <li>Employee security training materials</li>
                        <li>Ongoing security monitoring dan support</li>
                    </ul>
                '
            ],
            [
                'title' => 'AI & Machine Learning',
                'icon' => 'heroicon-o-cpu-chip',
                'short_description' => 'Integrasi kecerdasan buatan untuk automasi bisnis dan analisis data yang mendalam.',
                'full_content' => '
                    <h2>AI & Machine Learning Solutions</h2>
                    <p>Manfaatkan kekuatan artificial intelligence dan machine learning untuk mengotomatisasi proses bisnis, mendapatkan insights dari data, dan membuat keputusan yang lebih cerdas. Kami mengembangkan solusi AI custom yang disesuaikan dengan kebutuhan spesifik bisnis Anda.</p>
                    
                    <h3>Layanan AI/ML Kami</h3>
                    <ul>
                        <li><strong>Predictive Analytics:</strong> Forecasting dan trend analysis</li>
                        <li><strong>Natural Language Processing:</strong> Chatbots, sentiment analysis, text classification</li>
                        <li><strong>Computer Vision:</strong> Image recognition, object detection, facial recognition</li>
                        <li><strong>Recommendation Systems:</strong> Personalized product/content recommendations</li>
                        <li><strong>Anomaly Detection:</strong> Fraud detection, quality control</li>
                        <li><strong>Process Automation:</strong> RPA dengan AI untuk intelligent automation</li>
                    </ul>
                    
                    <h3>Technologies & Frameworks</h3>
                    <ul>
                        <li><strong>Machine Learning:</strong> TensorFlow, PyTorch, Scikit-learn</li>
                        <li><strong>Deep Learning:</strong> Keras, FastAI</li>
                        <li><strong>NLP:</strong> spaCy, NLTK, Hugging Face Transformers</li>
                        <li><strong>Computer Vision:</strong> OpenCV, YOLO, ResNet</li>
                        <li><strong>MLOps:</strong> MLflow, Kubeflow, AWS SageMaker</li>
                        <li><strong>Data Processing:</strong> Pandas, NumPy, Apache Spark</li>
                    </ul>
                    
                    <h3>Use Cases & Applications</h3>
                    <ul>
                        <li><strong>E-commerce:</strong> Product recommendations, dynamic pricing, inventory optimization</li>
                        <li><strong>Finance:</strong> Credit scoring, fraud detection, algorithmic trading</li>
                        <li><strong>Healthcare:</strong> Disease prediction, medical image analysis, drug discovery</li>
                        <li><strong>Manufacturing:</strong> Predictive maintenance, quality control, supply chain optimization</li>
                        <li><strong>Marketing:</strong> Customer segmentation, churn prediction, campaign optimization</li>
                        <li><strong>Customer Service:</strong> AI chatbots, ticket classification, sentiment analysis</li>
                    </ul>
                    
                    <h3>Development Process</h3>
                    <ol>
                        <li><strong>Problem Definition:</strong> Identify business problem dan success metrics</li>
                        <li><strong>Data Collection:</strong> Gather dan prepare training data</li>
                        <li><strong>Exploratory Analysis:</strong> Data analysis dan feature engineering</li>
                        <li><strong>Model Development:</strong> Train dan tune machine learning models</li>
                        <li><strong>Evaluation:</strong> Validate model performance dan accuracy</li>
                        <li><strong>Deployment:</strong> Deploy model ke production environment</li>
                        <li><strong>Monitoring:</strong> Track model performance dan retrain as needed</li>
                    </ol>
                    
                    <h3>AI Infrastructure</h3>
                    <ul>
                        <li><strong>Cloud AI Services:</strong> AWS SageMaker, Google AI Platform, Azure ML</li>
                        <li><strong>GPU Computing:</strong> NVIDIA GPUs untuk training cepat</li>
                        <li><strong>Model Serving:</strong> TensorFlow Serving, TorchServe, FastAPI</li>
                        <li><strong>Data Pipeline:</strong> Apache Airflow untuk automated workflows</li>
                        <li><strong>Model Versioning:</strong> DVC, MLflow untuk experiment tracking</li>
                    </ul>
                    
                    <h3>Deliverables</h3>
                    <ul>
                        <li>Trained machine learning models</li>
                        <li>Model documentation dan performance metrics</li>
                        <li>API endpoints untuk model inference</li>
                        <li>Data preprocessing pipeline</li>
                        <li>Model monitoring dashboard</li>
                        <li>Jupyter notebooks dengan analysis</li>
                        <li>Deployment scripts dan infrastructure code</li>
                        <li>Knowledge transfer dan training untuk tim Anda</li>
                    </ul>
                    
                    <h3>Expected Results</h3>
                    <ul>
                        <li>Automasi proses manual hingga 80%</li>
                        <li>Peningkatan accuracy dalam decision making</li>
                        <li>Cost reduction melalui optimization</li>
                        <li>Revenue increase dari personalization</li>
                        <li>Competitive advantage dengan AI-powered features</li>
                    </ul>
                '
            ],
        ];

        foreach ($services as $data) {
            Service::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'icon' => $data['icon'],
                'short_description' => $data['short_description'],
                'full_content' => $data['full_content'],
                'is_active' => true,
            ]);
        }
    }
}
