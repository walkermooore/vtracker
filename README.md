VulnTracker: Cybersecurity Asset & Vulnerability Manager
Developed by: Léo Walker da Silva
Credentials: Computer Science Student (UNEMAT) | English C2 Proficient

🇧🇷 Sobre o Projeto / 🇺🇸 Project Overview
O VulnTracker é uma plataforma robusta desenvolvida para equipes de Red Team e Blue Team gerenciarem o ciclo de vida de vulnerabilidades. O sistema permite o mapeamento de ativos, reporte detalhado de falhas com score CVSS, e um registro rigoroso de auditoria para compliance.

VulnTracker is a professional-grade platform built for Red and Blue Teams to streamline the vulnerability management lifecycle. It enables asset mapping, detailed flaw reporting using CVSS scoring, and maintains a rigorous audit trail for security compliance.

🚀 Funcionalidades / Key Features
Asset Management: Register and track systems, IPs, and monitored URLs.

Vulnerability Reporting: Technical documentation including Proof of Concept (PoC), severity levels, and impact metrics.

Security Dashboard: Real-time analytical view of critical risks and affected assets.

Audit Trail: Immutable logs of all analyst actions, ensuring transparency and accountability.

🛠️ Tech Stack
Framework: Laravel 11 (PHP 8.2+).

Frontend: Livewire 3 & Tailwind CSS.

Authentication: Laravel Breeze.

Database: PostgreSQL

Infrastructure: Docker & Docker Compose.

⚙️ Setup Instructions
Clone the repository: git clone [https://github.com/leowalker/vulntracker.git](https://github.com/leowalker/vulntracker.git).

Infrastructure: Run docker compose up -d.

Database: Execute php artisan migrate to set up the relational schema.

Build: Run npm run build for optimized production assets.
