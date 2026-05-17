import 'package:flutter/material.dart';
import 'ekonomi_bisnis_politik.dart';

class FakultasListScreen extends StatelessWidget {
  const FakultasListScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: Column(
        children: [
          _buildTopNav(context),
          Expanded(
            child: SingleChildScrollView(
              child: Column(
                children: [
                  _buildBreadcrumb(),
                  _buildFakultasGrid(context),
                  _buildFooter(),
                ],
              ),
            ),
          ),
        ],
      ),
    );
  }

  Widget _buildTopNav(BuildContext context) {
    return Container(
      color: const Color(0xFF1A2B5E),
      padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
      child: SafeArea(
        bottom: false,
        child: Row(
          children: [
            // Logo
            Container(
              padding: const EdgeInsets.all(4),
              child: Row(
                children: [
                  Container(
                    width: 44,
                    height: 44,
                    decoration: BoxDecoration(
                      shape: BoxShape.circle,
                      border: Border.all(color: Colors.white24),
                      color: Colors.white10,
                    ),
                    child: const Icon(Icons.school, color: Colors.white, size: 24),
                  ),
                  const SizedBox(width: 8),
                  Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: const [
                      Text('UMKT',
                          style: TextStyle(
                              color: Colors.white,
                              fontWeight: FontWeight.bold,
                              fontSize: 18,
                              letterSpacing: 1)),
                      Text('Universitas Muhammadiyah\nKalimantan Timur',
                          style: TextStyle(color: Colors.white60, fontSize: 9)),
                    ],
                  ),
                ],
              ),
            ),
            const Spacer(),
            // Menu items
            Wrap(
              spacing: 4,
              children: [
                _navItem('Berita', context),
                _navItem('Kampus UMKT', context),
                _navItem('Akademik', context),
                _navItem('UMKTalks Academy', context),
                _navItem('Events', context),
                _navItem('Why UMKT?', context),
                _navItem('Kontak', context),
              ],
            ),
          ],
        ),
      ),
    );
  }

  Widget _navItem(String label, BuildContext context) {
    return TextButton(
      onPressed: () {},
      style: TextButton.styleFrom(
        padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 4),
        minimumSize: Size.zero,
        tapTargetSize: MaterialTapTargetSize.shrinkWrap,
      ),
      child: Text(
        label,
        style: const TextStyle(color: Colors.white, fontSize: 11),
      ),
    );
  }

  Widget _buildBreadcrumb() {
    return Container(
      color: const Color(0xFFF5F5F5),
      padding: const EdgeInsets.symmetric(horizontal: 24, vertical: 10),
      child: Row(
        children: [
          const Icon(Icons.home, size: 14, color: Color(0xFF1A2B5E)),
          const SizedBox(width: 4),
          GestureDetector(
            onTap: () {},
            child: const Text('Home',
                style: TextStyle(color: Color(0xFF1A2B5E), fontSize: 13)),
          ),
          const Text(' > ', style: TextStyle(color: Colors.grey, fontSize: 13)),
          const Text('Fakultas',
              style: TextStyle(color: Colors.grey, fontSize: 13)),
        ],
      ),
    );
  }

  Widget _buildFakultasGrid(BuildContext context) {
    final List<Map<String, dynamic>> fakultasList = [
      {
        'title': 'Fakultas Kesehatan Masyarakat',
        'subtitle': 'KESEHATAN\nMASYARAKAT',
        'desc':
            'Fakultas Kesehatan Masyarakat di Universitas Muhammadiyah Kalimantan Timur menawarkan pendidikan kesehatan publik yang komprehensif, menghasilkan ...',
        'canNavigate': false,
      },
      {
        'title': 'Fakultas Ekonomi Bisnis dan Politik',
        'subtitle': 'EKONOMI BISNIS\nDAN POLITIK',
        'desc':
            'Fakultas Ekonomi Bisnis dan Politik di Universitas Muhammadiyah Kalimantan Timur menawarkan pendidikan berkualitas, menggabungkan teori ...',
        'canNavigate': true,
      },
      {
        'title': 'Fakultas Sains dan Teknologi',
        'subtitle': 'SAINS DAN\nTEKNOLOGI',
        'desc':
            'Fakultas Sains dan Teknologi di Universitas Muhammadiyah Kalimantan Timur memberikan pendidikan tinggi, menekankan ...',
        'canNavigate': false,
      },
      {
        'title': 'Fakultas Keguruan dan Ilmu Pendidikan',
        'subtitle': 'KEGURUAN DAN\nILMU PENDIDIKAN',
        'desc':
            'Fakultas Keguruan dan Ilmu Pendidikan di Universitas Muhammadiyah Kalimantan Timur berkamitmen ...',
        'canNavigate': false,
      },
    ];

    return Container(
      padding: const EdgeInsets.symmetric(horizontal: 24, vertical: 32),
      child: Column(
        children: [
          // Title
          Column(
            children: [
              const Text('Fakultas',
                  style: TextStyle(
                      fontSize: 28,
                      fontWeight: FontWeight.bold,
                      color: Color(0xFF1A1A1A))),
              const SizedBox(height: 8),
              Container(
                width: 48,
                height: 3,
                color: const Color(0xFFF5A623),
              ),
            ],
          ),
          const SizedBox(height: 32),
          // Grid
          GridView.builder(
            shrinkWrap: true,
            physics: const NeverScrollableScrollPhysics(),
            gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
              crossAxisCount: MediaQuery.of(context).size.width > 600 ? 2 : 1,
              crossAxisSpacing: 24,
              mainAxisSpacing: 24,
              childAspectRatio: 2.2,
            ),
            itemCount: fakultasList.length,
            itemBuilder: (context, index) {
              final item = fakultasList[index];
              return _buildFakultasCard(context, item);
            },
          ),
        ],
      ),
    );
  }

  Widget _buildFakultasCard(BuildContext context, Map<String, dynamic> item) {
    final bool canNavigate = item['canNavigate'] as bool;

    return GestureDetector(
      onTap: canNavigate
          ? () {
              Navigator.push(
                context,
                MaterialPageRoute(
                  builder: (_) => const EkonomiBisnisPolitikScreen(),
                ),
              );
            }
          : null,
      child: Row(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          // Card Banner
          Container(
            width: 160,
            height: 100,
            decoration: BoxDecoration(
              color: const Color(0xFF4A5568),
              borderRadius: BorderRadius.circular(6),
            ),
            child: Stack(
              children: [
                // Gradient overlay
                Container(
                  decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(6),
                    gradient: LinearGradient(
                      begin: Alignment.centerLeft,
                      end: Alignment.centerRight,
                      colors: [
                        Colors.black.withOpacity(0.6),
                        Colors.transparent,
                      ],
                    ),
                  ),
                ),
                Padding(
                  padding: const EdgeInsets.all(10),
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.center,
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      // Logo
                      Container(
                        width: 28,
                        height: 28,
                        decoration: BoxDecoration(
                          shape: BoxShape.circle,
                          border: Border.all(color: const Color(0xFFF5A623), width: 1.5),
                        ),
                        child: const Icon(Icons.school,
                            color: Colors.white, size: 16),
                      ),
                      const SizedBox(height: 6),
                      Container(
                        width: 2,
                        height: 20,
                        color: const Color(0xFFF5A623),
                        margin: const EdgeInsets.only(bottom: 4),
                      ),
                      Text(
                        'FAKULTAS\n${item['subtitle']}',
                        style: const TextStyle(
                          color: Colors.white,
                          fontWeight: FontWeight.bold,
                          fontSize: 9,
                          letterSpacing: 0.5,
                          height: 1.3,
                        ),
                      ),
                    ],
                  ),
                ),
              ],
            ),
          ),
          const SizedBox(width: 16),
          // Text content
          Expanded(
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                GestureDetector(
                  onTap: canNavigate
                      ? () {
                          Navigator.push(
                            context,
                            MaterialPageRoute(
                              builder: (_) => const EkonomiBisnisPolitikScreen(),
                            ),
                          );
                        }
                      : null,
                  child: Text(
                    item['title'],
                    style: TextStyle(
                      color: canNavigate
                          ? const Color(0xFF1A2B5E)
                          : const Color(0xFF1A2B5E),
                      fontWeight: FontWeight.bold,
                      fontSize: 15,
                      decoration: canNavigate
                          ? TextDecoration.none
                          : TextDecoration.none,
                    ),
                  ),
                ),
                const SizedBox(height: 6),
                Container(
                  width: 36,
                  height: 2.5,
                  color: const Color(0xFFF5A623),
                ),
                const SizedBox(height: 8),
                Text(
                  item['desc'],
                  style: const TextStyle(
                    color: Color(0xFF555555),
                    fontSize: 12,
                    height: 1.5,
                  ),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }

  Widget _buildFooter() {
    return Container(
      color: const Color(0xFF1A2B5E),
      padding: const EdgeInsets.symmetric(horizontal: 24, vertical: 32),
      child: Column(
        children: [
          Row(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              // Universitas info
              Expanded(
                flex: 2,
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Row(
                      children: [
                        const Icon(Icons.school, color: Colors.white, size: 28),
                        const SizedBox(width: 8),
                        Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: const [
                            Text('UMKT',
                                style: TextStyle(
                                    color: Colors.white,
                                    fontWeight: FontWeight.bold,
                                    fontSize: 16)),
                            Text('Universitas Muhammadiyah\nKalimantan Timur',
                                style: TextStyle(
                                    color: Colors.white60, fontSize: 10)),
                          ],
                        ),
                      ],
                    ),
                    const SizedBox(height: 16),
                    _footerInfoRow(Icons.location_on,
                        'Jl. Ir. H. Juanda No.15, Sidodadi,\nKec. Samarinda Ulu, Kota Samarinda,\nKalimantan Timur 75124'),
                    const SizedBox(height: 8),
                    _footerInfoRow(Icons.access_time, 'Jam Kerja:\n08.00 am - 04.00 pm'),
                    const SizedBox(height: 8),
                    _footerInfoRow(Icons.phone, '(0541) 748000'),
                    const SizedBox(height: 8),
                    _footerInfoRow(Icons.email, 'web@umkt.ac.id'),
                  ],
                ),
              ),
              // Akses Cepat
              Expanded(
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    const Text('AKSES CEPAT',
                        style: TextStyle(
                            color: Colors.white,
                            fontWeight: FontWeight.bold,
                            fontSize: 12,
                            letterSpacing: 1)),
                    const SizedBox(height: 12),
                    _footerLink('Penerimaan'),
                    _footerLink('SIAD'),
                    _footerLink('E-Learning'),
                  ],
                ),
              ),
              // Tentang UMKT
              Expanded(
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    const Text('TENTANG UMKT',
                        style: TextStyle(
                            color: Colors.white,
                            fontWeight: FontWeight.bold,
                            fontSize: 12,
                            letterSpacing: 1)),
                    const SizedBox(height: 12),
                    _footerLink('Profil'),
                    _footerLink('Pimpinan/Yayasan'),
                    _footerLink('Fakultas'),
                    _footerLink('Kontak'),
                  ],
                ),
              ),
              // Media Sosial
              Expanded(
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    const Text('MEDIA SOSIAL',
                        style: TextStyle(
                            color: Colors.white,
                            fontWeight: FontWeight.bold,
                            fontSize: 12,
                            letterSpacing: 1)),
                    const SizedBox(height: 12),
                    _footerLink('Instagram'),
                    _footerLink('Facebook'),
                  ],
                ),
              ),
            ],
          ),
          const Divider(color: Colors.white24, height: 40),
          const Text(
            'Universitas Muhammadiyah Kalimantan Timur © Hak Cipta 2024',
            style: TextStyle(color: Colors.white54, fontSize: 11),
            textAlign: TextAlign.center,
          ),
        ],
      ),
    );
  }

  Widget _footerInfoRow(IconData icon, String text) {
    return Row(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Icon(icon, color: Colors.white60, size: 14),
        const SizedBox(width: 8),
        Expanded(
          child: Text(text,
              style: const TextStyle(color: Colors.white70, fontSize: 11, height: 1.5)),
        ),
      ],
    );
  }

  Widget _footerLink(String text) {
    return Padding(
      padding: const EdgeInsets.only(bottom: 8),
      child: GestureDetector(
        onTap: () {},
        child: Text(text,
            style: const TextStyle(
                color: Colors.white70, fontSize: 11,
                decoration: TextDecoration.underline,
                decorationColor: Colors.white30)),
      ),
    );
  }
}
