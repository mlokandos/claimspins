<?php
/**
 * Generate per-language JSON files from affiliates_enriched.json
 * Run: php generate_data.php
 * Output: data/{lang}.json
 */

$inputFile = __DIR__ . '/affiliates_enriched.json';
$outputDir = __DIR__ . '/data';

if (!is_dir($outputDir)) {
    mkdir($outputDir, 0755, true);
}

$raw = json_decode(file_get_contents($inputFile), true);
if (!$raw) {
    die("Failed to parse affiliates_enriched.json\n");
}

// ─── TRANSLATIONS ───────────────────────────────────────────────────────────
$translations = [
    'en' => [
        'title' => 'Best Casino Bonuses & Free Spins 2026 | Top Offers',
        'description' => 'Compare the best online casino bonuses for 2026. Exclusive no-deposit spins, promo codes & welcome offers. Claim your bonus today!',
        'keywords' => 'online casino, best casino bonus, no deposit bonus, free spins, welcome bonus, casino promo codes, real money casino, slots online, casino 2026, best odds',
        'h1' => 'Best Casino Bonuses 2026',
        'subtitle' => 'Discover exclusive bonuses up to €600 and 200 free spins. No-deposit offers available — start winning today!',
        'trust' => [
            '🔒 Licensed & Regulated Casinos',
            '⚡ Fast Payouts Guaranteed',
            '📱 Mobile Casino Ready',
            '🎁 No Deposit Bonuses',
            '✅ Expert Verified Offers'
        ],
        'nav' => [
            'all'     => '🏠 All Offers',
            'reg'     => '🎁 Registration Bonus',
            'bonus'   => '💰 Bonuses',
            'free'    => '🆓 No Deposit',
            'slots'   => '🎰 Slots',
            'jackpot' => '💎 Jackpots',
            'live'    => '🃏 Live Casino',
            'sport'   => '⚽ Sports',
            'tourn'   => '🏆 Tournaments'
        ],
        'categories' => [
            'reg'     => ['label' => '🎁 Registration','headline' => 'Sign Up & Get Rewarded','sub' => 'Quick registration bonuses with instant rewards'],
            'bonus'   => ['label' => '💰 Bonuses','headline' => 'Biggest Welcome Bonuses','sub' => 'Top deposit match offers and free spins packages'],
            'free'    => ['label' => '🆓 No Deposit','headline' => 'No Risk, Real Rewards','sub' => 'Free spins and bonuses without any deposit'],
            'slots'   => ['label' => '🎰 Slots','headline' => 'Spin & Win Instantly','sub' => 'Top slot games with the best RTPs'],
            'jackpot' => ['label' => '💎 Jackpots','headline' => 'Life-Changing Jackpots','sub' => 'Progressive jackpots worth millions'],
            'live'    => ['label' => '🃏 Live Casino','headline' => 'Real Dealers, Real Wins','sub' => 'Live blackjack, roulette and baccarat'],
            'sport'   => ['label' => '⚽ Sports','headline' => 'Best Odds, Biggest Wins','sub' => 'Football, tennis and live betting offers'],
            'tourn'   => ['label' => '🏆 Tournaments','headline' => 'Compete for Grand Prizes','sub' => 'Casino and sport tournament events'],
            'main'    => ['label' => '🏠 General','headline' => 'Explore Top Casinos','sub' => 'Homepage, rules and general information']
        ],
        'cta' => 'Claim Now',
        'seo_text' => [
            'about_h2' => 'Your Guide to the Best Online Casino Bonuses in 2026',
            'about_p1' => 'Welcome to your ultimate destination for finding the best online casino bonuses available right now. We compare hundreds of offers from licensed casinos to bring you exclusive welcome bonuses, no-deposit free spins, and promo codes that actually work. Whether you prefer slots, live dealer games, or sports betting, our curated list helps you find the perfect bonus to maximize your bankroll and gaming experience.',
            'about_p2' => 'Every casino listed on our platform holds a valid license from respected authorities like the Malta Gaming Authority (MGA) or Curacao eGaming. We verify each operator\'s security measures, payment processing times, and customer support quality. Your safety is our priority — we only recommend casinos that use SSL encryption, offer responsible gambling tools, and have a proven track record of fair play and timely payouts.',
            'about_p3' => 'Understanding wagering requirements is key to choosing the right bonus. A 35x wagering requirement means you must bet 35 times the bonus amount before withdrawing. Check our <a href="#bonus">bonus section</a> for the best match offers, or explore <a href="#free">no-deposit deals</a> to play risk-free. Always read the terms and conditions, compare minimum deposits, and choose bonuses that match your playing style for the best experience.'
        ],
        'faq' => [
            ['q' => 'What is the best online casino bonus in 2026?', 'a' => 'The best casino bonuses in 2026 include offers up to €600 with 200 free spins. Casinia offers 100% up to €500 + 200 free spins with an MGA Malta license, while Spinanga provides 200% up to €600. Compare all current offers on our site to find the one that matches your preferences and playing style.'],
            ['q' => 'How do I use a casino promo code?', 'a' => 'To use a promo code, copy it from our site (e.g., RABONA20 or CASINIA30), then paste it during registration or in the cashier/deposit section of the casino. Some codes activate no-deposit free spins automatically. Always check if the code needs to be entered during signup or when making your first deposit.'],
            ['q' => 'What does wagering requirement mean?', 'a' => 'A wagering requirement (e.g., 35x) means you must bet that multiple of your bonus before withdrawing winnings. For example, a €100 bonus with 35x wagering requires €3,500 in total bets. Lower wagering requirements like 30x are more favorable. Slot games usually contribute 100% toward meeting the requirement.'],
            ['q' => 'Are these online casinos safe and licensed?', 'a' => 'Yes, all casinos we list hold valid licenses from the Malta Gaming Authority (MGA) or Curacao eGaming. They use SSL encryption to protect your data, offer responsible gambling tools, and undergo regular audits. We verify each casino\'s licensing status and reputation before including them on our platform.'],
            ['q' => 'How fast can I withdraw my winnings?', 'a' => 'Withdrawal times vary by casino and payment method. E-wallets and crypto withdrawals are typically processed within 24 hours. Bank transfers may take 2-5 business days. Most casinos on our list are known for fast payouts. Always verify your account first to avoid delays when requesting a withdrawal.'],
            ['q' => 'Can I play on mobile devices?', 'a' => 'Absolutely! All casinos we recommend are fully optimized for mobile play. You can access games, make deposits, claim bonuses, and withdraw winnings directly from your smartphone or tablet browser. Some casinos like Rabona also offer dedicated mobile apps for an even smoother experience on Android and iOS.']
        ],
        'footer' => [
            'disclaimer_18' => '18+ Only. Gambling can be addictive. Play responsibly.',
            'affiliate_disclosure' => 'This website contains affiliate links. We may earn a commission at no extra cost to you when you sign up through our links. This helps us maintain the site and provide free comparisons.',
            'responsible_gambling' => 'If you feel that gambling is becoming a problem, please seek help. Visit GamCare (www.gamcare.org.uk) or BeGambleAware (www.begambleaware.org) for support and resources.'
        ],
        'highlights_map' => [
            'Live Casino' => 'Live Casino',
            'Sports Betting' => 'Sports Betting',
            'Fast Payouts' => 'Fast Payouts',
            'Mobile App' => 'Mobile App',
            'Weekly Cashback' => 'Weekly Cashback',
            'Tournaments' => 'Tournaments',
            'Fast Withdrawal' => 'Fast Withdrawal',
            'Sports & Casino' => 'Sports & Casino',
            'Live Betting' => 'Live Betting',
            'Chicken Road Game' => 'Chicken Road Game',
            'Weekly Reload' => 'Weekly Reload',
            'Crypto Casino' => 'Crypto Casino',
            'High Bonus' => 'High Bonus',
            'Poker Games' => 'Poker Games',
            '5000+ Games' => '5000+ Games',
            'No Deposit Bonus' => 'No Deposit Bonus',
            'Crypto Accepted' => 'Crypto Accepted',
            'VIP Program' => 'VIP Program',
            'No Deposit Spins' => 'No Deposit Spins',
            'Slots Specialist' => 'Slots Specialist',
            'Mobile Optimized' => 'Mobile Optimized',
            'Daily Promotions' => 'Daily Promotions',
            'Esports' => 'Esports',
            'Crypto Payments' => 'Crypto Payments',
            'Seasonal Promotions' => 'Seasonal Promotions',
            'Table Games' => 'Table Games',
            'Slots' => 'Slots',
            'Online Casino' => 'Online Casino'
        ]
    ],
    'de' => [
        'title' => 'Beste Casino Boni & Freispiele 2026 | Top Angebote',
        'description' => 'Vergleiche die besten Online-Casino-Boni 2026. Exklusive Freispiele ohne Einzahlung, Promo-Codes & Willkommensboni. Jetzt Bonus sichern!',
        'keywords' => 'online casino, casino bonus, freispiele, willkommensbonus, ohne einzahlung, promo code, echtgeld casino, beste online casinos, sportwetten, casino 2026',
        'h1' => 'Beste Casino Boni 2026',
        'subtitle' => 'Entdecke exklusive Boni bis zu €600 und 200 Freispiele. Angebote ohne Einzahlung verfügbar — starte jetzt!',
        'trust' => [
            '🔒 Lizenzierte & regulierte Casinos',
            '⚡ Schnelle Auszahlungen garantiert',
            '📱 Mobiles Casino verfügbar',
            '🎁 Bonus ohne Einzahlung',
            '✅ Von Experten geprüft'
        ],
        'nav' => [
            'all'     => '🏠 Alle Angebote',
            'reg'     => '🎁 Registrierungsbonus',
            'bonus'   => '💰 Boni',
            'free'    => '🆓 Ohne Einzahlung',
            'slots'   => '🎰 Spielautomaten',
            'jackpot' => '💎 Jackpots',
            'live'    => '🃏 Live Casino',
            'sport'   => '⚽ Sportwetten',
            'tourn'   => '🏆 Turniere'
        ],
        'categories' => [
            'reg'     => ['label' => '🎁 Registrierung','headline' => 'Anmelden & Sofort Profitieren','sub' => 'Schnelle Registrierung mit sofortigen Belohnungen'],
            'bonus'   => ['label' => '💰 Boni','headline' => 'Größte Willkommensboni Sichern','sub' => 'Top Einzahlungsboni und Freispiel-Pakete'],
            'free'    => ['label' => '🆓 Ohne Einzahlung','headline' => 'Kein Risiko, Echte Gewinne','sub' => 'Freispiele und Boni ohne Einzahlung'],
            'slots'   => ['label' => '🎰 Spielautomaten','headline' => 'Sofort Spielen & Gewinnen','sub' => 'Top Slots mit den besten Auszahlungsquoten'],
            'jackpot' => ['label' => '💎 Jackpots','headline' => 'Lebensverändernde Jackpots','sub' => 'Progressive Jackpots in Millionenhöhe'],
            'live'    => ['label' => '🃏 Live Casino','headline' => 'Echte Dealer, Echte Gewinne','sub' => 'Live Blackjack, Roulette und Baccarat'],
            'sport'   => ['label' => '⚽ Sportwetten','headline' => 'Beste Quoten, Größte Gewinne','sub' => 'Fußball, Tennis und Live-Wetten Angebote'],
            'tourn'   => ['label' => '🏆 Turniere','headline' => 'Kämpfe um Große Preise','sub' => 'Casino- und Sport-Turnierveranstaltungen'],
            'main'    => ['label' => '🏠 Allgemein','headline' => 'Top Casinos Entdecken','sub' => 'Startseite, Regeln und allgemeine Infos']
        ],
        'cta' => 'Jetzt Sichern',
        'seo_text' => [
            'about_h2' => 'Dein Guide zu den besten Online-Casino-Boni 2026',
            'about_p1' => 'Willkommen auf deiner ultimativen Plattform für die besten Online-Casino-Boni. Wir vergleichen hunderte Angebote von lizenzierten Casinos und bringen dir exklusive Willkommensboni, Freispiele ohne Einzahlung und funktionierende Promo-Codes. Ob du Spielautomaten, Live-Dealer-Spiele oder Sportwetten bevorzugst — unsere kuratierte Liste hilft dir, den perfekten Bonus für maximalen Spielspaß zu finden.',
            'about_p2' => 'Jedes Casino auf unserer Plattform besitzt eine gültige Lizenz von anerkannten Behörden wie der Malta Gaming Authority (MGA) oder Curacao eGaming. Wir überprüfen Sicherheitsmaßnahmen, Auszahlungszeiten und Kundenservice-Qualität jedes Anbieters. Deine Sicherheit hat Priorität — wir empfehlen nur Casinos mit SSL-Verschlüsselung, Responsible-Gambling-Tools und nachweislich fairen Spielbedingungen.',
            'about_p3' => 'Umsatzbedingungen zu verstehen ist entscheidend bei der Bonuswahl. Eine 35x-Umsatzanforderung bedeutet, dass du den Bonusbetrag 35 Mal umsetzen musst. Besuche unsere <a href="#bonus">Bonus-Sektion</a> für die besten Angebote oder entdecke <a href="#free">Angebote ohne Einzahlung</a> zum risikofreien Spielen. Lies immer die AGB, vergleiche Mindesteinzahlungen und wähle den passenden Bonus.'
        ],
        'faq' => [
            ['q' => 'Was ist der beste Online-Casino-Bonus 2026?', 'a' => 'Die besten Casino-Boni 2026 bieten bis zu €600 mit 200 Freispielen. Casinia bietet 100% bis €500 + 200 Freispiele mit MGA-Lizenz, Spinanga 200% bis €600. Vergleiche alle aktuellen Angebote auf unserer Seite, um das beste für deinen Spielstil zu finden.'],
            ['q' => 'Wie verwende ich einen Casino-Promo-Code?', 'a' => 'Kopiere den Promo-Code von unserer Seite (z.B. RABONA20 oder CASINIA30) und füge ihn bei der Registrierung oder im Kassenbereich ein. Manche Codes aktivieren Freispiele ohne Einzahlung automatisch. Prüfe, ob der Code bei der Anmeldung oder bei der ersten Einzahlung eingegeben werden muss.'],
            ['q' => 'Was bedeuten Umsatzbedingungen?', 'a' => 'Umsatzbedingungen (z.B. 35x) bedeuten, dass du den Bonusbetrag entsprechend oft umsetzen musst, bevor du Gewinne auszahlen kannst. Bei einem €100 Bonus mit 35x sind das €3.500 Gesamteinsatz. Niedrigere Anforderungen wie 30x sind vorteilhafter. Spielautomaten zählen meist zu 100%.'],
            ['q' => 'Sind diese Online-Casinos sicher und lizenziert?', 'a' => 'Ja, alle gelisteten Casinos besitzen gültige Lizenzen der Malta Gaming Authority oder Curacao eGaming. Sie nutzen SSL-Verschlüsselung, bieten Responsible-Gambling-Tools und werden regelmäßig geprüft. Wir verifizieren den Lizenzstatus und die Reputation jedes Casinos vor der Aufnahme.'],
            ['q' => 'Wie schnell kann ich meine Gewinne auszahlen?', 'a' => 'Auszahlungszeiten variieren je nach Casino und Zahlungsmethode. E-Wallets und Krypto-Auszahlungen werden meist innerhalb von 24 Stunden bearbeitet. Banküberweisungen dauern 2-5 Werktage. Die meisten Casinos auf unserer Liste sind für schnelle Auszahlungen bekannt.'],
            ['q' => 'Kann ich auf dem Handy spielen?', 'a' => 'Absolut! Alle empfohlenen Casinos sind vollständig für mobiles Spielen optimiert. Du kannst Spiele spielen, einzahlen, Boni beanspruchen und Gewinne auszahlen — direkt im Smartphone-Browser. Einige Casinos wie Rabona bieten auch dedizierte Apps für Android und iOS.']
        ],
        'footer' => [
            'disclaimer_18' => '18+ Nur für Erwachsene. Glücksspiel kann süchtig machen. Spiele verantwortungsbewusst.',
            'affiliate_disclosure' => 'Diese Website enthält Affiliate-Links. Wir erhalten möglicherweise eine Provision, wenn du dich über unsere Links anmeldest — ohne Mehrkosten für dich.',
            'responsible_gambling' => 'Wenn Glücksspiel zum Problem wird, hole dir Hilfe. Besuche die Bundeszentrale für gesundheitliche Aufklärung (www.bzga.de) oder GamCare (www.gamcare.org.uk).'
        ],
        'highlights_map' => [
            'Live Casino' => 'Live Casino',
            'Sports Betting' => 'Sportwetten',
            'Fast Payouts' => 'Schnelle Auszahlungen',
            'Mobile App' => 'Mobile App',
            'Weekly Cashback' => 'Wöchentliches Cashback',
            'Tournaments' => 'Turniere',
            'Fast Withdrawal' => 'Schnelle Auszahlung',
            'Sports & Casino' => 'Sport & Casino',
            'Live Betting' => 'Live-Wetten',
            'Chicken Road Game' => 'Chicken Road Spiel',
            'Weekly Reload' => 'Wöchentlicher Reload',
            'Crypto Casino' => 'Krypto Casino',
            'High Bonus' => 'Hoher Bonus',
            'Poker Games' => 'Pokerspiele',
            '5000+ Games' => '5000+ Spiele',
            'No Deposit Bonus' => 'Bonus ohne Einzahlung',
            'Crypto Accepted' => 'Krypto akzeptiert',
            'VIP Program' => 'VIP-Programm',
            'No Deposit Spins' => 'Freispiele ohne Einzahlung',
            'Slots Specialist' => 'Slot-Spezialist',
            'Mobile Optimized' => 'Mobil optimiert',
            'Daily Promotions' => 'Tägliche Aktionen',
            'Esports' => 'Esports',
            'Crypto Payments' => 'Krypto-Zahlungen',
            'Seasonal Promotions' => 'Saisonale Aktionen',
            'Table Games' => 'Tischspiele',
            'Slots' => 'Spielautomaten',
            'Online Casino' => 'Online Casino'
        ]
    ],
    'fr' => [
        'title' => 'Meilleurs Bonus Casino & Tours Gratuits 2026',
        'description' => 'Comparez les meilleurs bonus casino en ligne 2026. Tours gratuits sans dépôt, codes promo & offres de bienvenue exclusives. Réclamez maintenant!',
        'keywords' => 'casino en ligne, bonus casino, tours gratuits, sans dépôt, code promo, bonus bienvenue, argent réel, meilleurs casinos, paris sportifs, casino 2026',
        'h1' => 'Meilleurs Bonus Casino 2026',
        'subtitle' => 'Découvrez des bonus exclusifs jusqu\'à €600 et 200 tours gratuits. Offres sans dépôt disponibles — commencez à gagner!',
        'trust' => [
            '🔒 Casinos licenciés et régulés',
            '⚡ Retraits rapides garantis',
            '📱 Casino mobile disponible',
            '🎁 Bonus sans dépôt',
            '✅ Vérifié par des experts'
        ],
        'nav' => [
            'all'     => '🏠 Toutes les offres',
            'reg'     => '🎁 Bonus inscription',
            'bonus'   => '💰 Bonus',
            'free'    => '🆓 Sans dépôt',
            'slots'   => '🎰 Machines à sous',
            'jackpot' => '💎 Jackpots',
            'live'    => '🃏 Casino en direct',
            'sport'   => '⚽ Paris sportifs',
            'tourn'   => '🏆 Tournois'
        ],
        'categories' => [
            'reg'     => ['label' => '🎁 Inscription','headline' => 'Inscrivez-vous et Gagnez','sub' => 'Bonus d\'inscription rapide avec récompenses instantanées'],
            'bonus'   => ['label' => '💰 Bonus','headline' => 'Les Plus Gros Bonus','sub' => 'Meilleures offres de dépôt et tours gratuits'],
            'free'    => ['label' => '🆓 Sans Dépôt','headline' => 'Zéro Risque, Vrais Gains','sub' => 'Tours gratuits et bonus sans aucun dépôt'],
            'slots'   => ['label' => '🎰 Machines à sous','headline' => 'Tournez et Gagnez Gros','sub' => 'Top machines à sous avec les meilleurs RTP'],
            'jackpot' => ['label' => '💎 Jackpots','headline' => 'Jackpots qui Changent la Vie','sub' => 'Jackpots progressifs valant des millions'],
            'live'    => ['label' => '🃏 Casino en Direct','headline' => 'Vrais Croupiers, Vrais Gains','sub' => 'Blackjack, roulette et baccarat en direct'],
            'sport'   => ['label' => '⚽ Paris Sportifs','headline' => 'Meilleures Cotes, Plus Gros Gains','sub' => 'Football, tennis et paris en direct'],
            'tourn'   => ['label' => '🏆 Tournois','headline' => 'Concourez pour les Grands Prix','sub' => 'Événements et tournois de casino et sport'],
            'main'    => ['label' => '🏠 Général','headline' => 'Explorez les Top Casinos','sub' => 'Page d\'accueil, règles et informations']
        ],
        'cta' => 'Réclamer',
        'seo_text' => [
            'about_h2' => 'Votre guide des meilleurs bonus casino en ligne 2026',
            'about_p1' => 'Bienvenue sur votre destination ultime pour trouver les meilleurs bonus de casino en ligne. Nous comparons des centaines d\'offres de casinos licenciés pour vous apporter des bonus de bienvenue exclusifs, des tours gratuits sans dépôt et des codes promo fonctionnels. Que vous préfériez les machines à sous, les jeux avec croupier en direct ou les paris sportifs, notre liste vous aide à maximiser votre expérience.',
            'about_p2' => 'Chaque casino listé possède une licence valide d\'autorités respectées comme la Malta Gaming Authority (MGA) ou Curacao eGaming. Nous vérifions les mesures de sécurité, les délais de paiement et la qualité du service client. Votre sécurité est notre priorité — nous recommandons uniquement des casinos avec cryptage SSL, outils de jeu responsable et historique de paiements fiables.',
            'about_p3' => 'Comprendre les conditions de mise est essentiel. Un wagering de 35x signifie miser 35 fois le montant du bonus avant retrait. Visitez notre <a href="#bonus">section bonus</a> pour les meilleures offres, ou explorez nos <a href="#free">offres sans dépôt</a> pour jouer sans risque. Lisez toujours les conditions, comparez les dépôts minimums et choisissez le bonus adapté à votre style.'
        ],
        'faq' => [
            ['q' => 'Quel est le meilleur bonus casino en ligne 2026?', 'a' => 'Les meilleurs bonus 2026 offrent jusqu\'à €600 avec 200 tours gratuits. Casinia propose 100% jusqu\'à €500 + 200 tours avec licence MGA, Spinanga 200% jusqu\'à €600. Comparez toutes les offres sur notre site pour trouver celle qui vous convient.'],
            ['q' => 'Comment utiliser un code promo casino?', 'a' => 'Copiez le code promo depuis notre site (ex: RABONA20 ou CASINIA30), puis collez-le lors de l\'inscription ou dans la section caisse. Certains codes activent des tours gratuits automatiquement. Vérifiez si le code doit être saisi à l\'inscription ou au premier dépôt.'],
            ['q' => 'Que signifient les conditions de mise?', 'a' => 'Les conditions de mise (ex: 35x) signifient que vous devez miser ce multiple du bonus avant de retirer. Pour un bonus de €100 à 35x, il faut €3.500 de mises totales. Des conditions plus basses comme 30x sont plus avantageuses. Les machines à sous comptent généralement à 100%.'],
            ['q' => 'Ces casinos en ligne sont-ils sûrs et licenciés?', 'a' => 'Oui, tous les casinos listés possèdent des licences valides de la Malta Gaming Authority ou Curacao eGaming. Ils utilisent le cryptage SSL, offrent des outils de jeu responsable et sont régulièrement audités. Nous vérifions chaque casino avant de l\'inclure.'],
            ['q' => 'Combien de temps pour retirer mes gains?', 'a' => 'Les délais varient selon le casino et le moyen de paiement. Les portefeuilles électroniques et crypto sont traités en 24h. Les virements bancaires prennent 2-5 jours ouvrés. La plupart des casinos de notre liste sont réputés pour leurs retraits rapides.'],
            ['q' => 'Puis-je jouer sur mobile?', 'a' => 'Absolument! Tous les casinos recommandés sont optimisés pour le mobile. Jouez, déposez, réclamez des bonus et retirez depuis votre smartphone. Certains casinos comme Rabona proposent aussi des applications dédiées pour Android et iOS.']
        ],
        'footer' => [
            'disclaimer_18' => '18+ Réservé aux adultes. Le jeu peut être addictif. Jouez de manière responsable.',
            'affiliate_disclosure' => 'Ce site contient des liens affiliés. Nous pouvons percevoir une commission sans frais supplémentaires pour vous lorsque vous vous inscrivez via nos liens.',
            'responsible_gambling' => 'Si le jeu devient un problème, cherchez de l\'aide. Visitez Joueurs Info Service (www.joueurs-info-service.fr) ou SOS Joueurs (www.sosjoueurs.org).'
        ],
        'highlights_map' => [
            'Live Casino' => 'Casino en Direct',
            'Sports Betting' => 'Paris Sportifs',
            'Fast Payouts' => 'Paiements Rapides',
            'Mobile App' => 'Application Mobile',
            'Weekly Cashback' => 'Cashback Hebdomadaire',
            'Tournaments' => 'Tournois',
            'Fast Withdrawal' => 'Retrait Rapide',
            'Sports & Casino' => 'Sport & Casino',
            'Live Betting' => 'Paris en Direct',
            'Chicken Road Game' => 'Jeu Chicken Road',
            'Weekly Reload' => 'Reload Hebdomadaire',
            'Crypto Casino' => 'Casino Crypto',
            'High Bonus' => 'Gros Bonus',
            'Poker Games' => 'Jeux de Poker',
            '5000+ Games' => '5000+ Jeux',
            'No Deposit Bonus' => 'Bonus Sans Dépôt',
            'Crypto Accepted' => 'Crypto Accepté',
            'VIP Program' => 'Programme VIP',
            'No Deposit Spins' => 'Tours Sans Dépôt',
            'Slots Specialist' => 'Spécialiste Slots',
            'Mobile Optimized' => 'Optimisé Mobile',
            'Daily Promotions' => 'Promos Quotidiennes',
            'Esports' => 'Esports',
            'Crypto Payments' => 'Paiements Crypto',
            'Seasonal Promotions' => 'Promos Saisonnières',
            'Table Games' => 'Jeux de Table',
            'Slots' => 'Machines à Sous',
            'Online Casino' => 'Casino en Ligne'
        ]
    ],
    'it' => [
        'title' => 'Migliori Bonus Casinò & Giri Gratis 2026',
        'description' => 'Confronta i migliori bonus casinò online 2026. Giri gratis senza deposito, codici promo e offerte di benvenuto esclusive. Reclama il tuo bonus!',
        'keywords' => 'casinò online, bonus casinò, giri gratis, senza deposito, codice promo, bonus benvenuto, soldi veri, migliori casinò, scommesse sportive, casinò 2026',
        'h1' => 'Migliori Bonus Casinò 2026',
        'subtitle' => 'Scopri bonus esclusivi fino a €600 e 200 giri gratis. Offerte senza deposito disponibili — inizia a vincere oggi!',
        'trust' => ['🔒 Casinò con licenza e regolamentati','⚡ Prelievi rapidi garantiti','📱 Casinò mobile disponibile','🎁 Bonus senza deposito','✅ Verificato da esperti'],
        'nav' => ['all'=>'🏠 Tutte le offerte','reg'=>'🎁 Bonus registrazione','bonus'=>'💰 Bonus','free'=>'🆓 Senza deposito','slots'=>'🎰 Slot','jackpot'=>'💎 Jackpot','live'=>'🃏 Casinò live','sport'=>'⚽ Scommesse','tourn'=>'🏆 Tornei'],
        'categories' => [
            'reg'=>['label'=>'🎁 Registrazione','headline'=>'Iscriviti e Vinci Subito','sub'=>'Bonus registrazione rapida con premi istantanei'],
            'bonus'=>['label'=>'💰 Bonus','headline'=>'I Migliori Bonus Benvenuto','sub'=>'Top offerte deposito e pacchetti giri gratis'],
            'free'=>['label'=>'🆓 Senza Deposito','headline'=>'Zero Rischio, Veri Premi','sub'=>'Giri gratis e bonus senza deposito'],
            'slots'=>['label'=>'🎰 Slot','headline'=>'Gira e Vinci Subito','sub'=>'Le migliori slot con alti RTP'],
            'jackpot'=>['label'=>'💎 Jackpot','headline'=>'Jackpot che Cambiano la Vita','sub'=>'Jackpot progressivi da milioni'],
            'live'=>['label'=>'🃏 Casinò Live','headline'=>'Dealer Veri, Vincite Reali','sub'=>'Blackjack, roulette e baccarat dal vivo'],
            'sport'=>['label'=>'⚽ Scommesse','headline'=>'Le Migliori Quote Sportive','sub'=>'Calcio, tennis e scommesse live'],
            'tourn'=>['label'=>'🏆 Tornei','headline'=>'Competi per Grandi Premi','sub'=>'Eventi e tornei di casinò e sport'],
            'main'=>['label'=>'🏠 Generale','headline'=>'Esplora i Top Casinò','sub'=>'Homepage, regole e informazioni']
        ],
        'cta' => 'Ottieni Ora',
        'seo_text' => [
            'about_h2' => 'La tua guida ai migliori bonus casinò online 2026',
            'about_p1' => 'Benvenuto sulla tua destinazione definitiva per trovare i migliori bonus casinò online. Confrontiamo centinaia di offerte da casinò con licenza per offrirti bonus di benvenuto esclusivi, giri gratis senza deposito e codici promo funzionanti. Che tu preferisca le slot, i giochi con dealer dal vivo o le scommesse sportive, la nostra lista curata ti aiuta a trovare il bonus perfetto.',
            'about_p2' => 'Ogni casinò elencato possiede una licenza valida da autorità rispettate come la Malta Gaming Authority (MGA) o Curacao eGaming. Verifichiamo le misure di sicurezza, i tempi di pagamento e la qualità del servizio clienti. La tua sicurezza è la nostra priorità — raccomandiamo solo casinò con crittografia SSL e strumenti di gioco responsabile.',
            'about_p3' => 'Capire i requisiti di scommessa è fondamentale. Un wagering di 35x significa scommettere 35 volte il bonus prima del prelievo. Visita la nostra <a href="#bonus">sezione bonus</a> per le migliori offerte, o esplora le <a href="#free">offerte senza deposito</a> per giocare senza rischio. Leggi sempre i termini e confronta i depositi minimi.'
        ],
        'faq' => [
            ['q'=>'Qual è il miglior bonus casinò online 2026?','a'=>'I migliori bonus 2026 offrono fino a €600 con 200 giri gratis. Casinia offre 100% fino a €500 + 200 giri con licenza MGA, Spinanga 200% fino a €600. Confronta tutte le offerte sul nostro sito per trovare quella adatta al tuo stile di gioco.'],
            ['q'=>'Come si usa un codice promo casinò?','a'=>'Copia il codice promo dal nostro sito (es. RABONA20 o CASINIA30), poi incollalo durante la registrazione o nella sezione cassa. Alcuni codici attivano giri gratis automaticamente. Verifica se il codice va inserito alla registrazione o al primo deposito.'],
            ['q'=>'Cosa significa requisito di scommessa?','a'=>'Un requisito di scommessa (es. 35x) significa che devi scommettere quel multiplo del bonus prima di prelevare. Per un bonus di €100 a 35x servono €3.500 di scommesse totali. Requisiti più bassi come 30x sono più vantaggiosi.'],
            ['q'=>'Questi casinò online sono sicuri e con licenza?','a'=>'Sì, tutti i casinò elencati possiedono licenze valide della Malta Gaming Authority o Curacao eGaming. Utilizzano crittografia SSL, offrono strumenti di gioco responsabile e sono regolarmente controllati.'],
            ['q'=>'Quanto velocemente posso prelevare le vincite?','a'=>'I tempi variano per casinò e metodo di pagamento. E-wallet e crypto vengono elaborati in 24 ore. I bonifici bancari richiedono 2-5 giorni lavorativi. La maggior parte dei casinò sulla nostra lista è nota per prelievi rapidi.'],
            ['q'=>'Posso giocare da mobile?','a'=>'Assolutamente! Tutti i casinò consigliati sono ottimizzati per il mobile. Puoi giocare, depositare, reclamare bonus e prelevare direttamente dal browser del tuo smartphone. Alcuni casinò come Rabona offrono anche app dedicate.']
        ],
        'footer' => [
            'disclaimer_18' => '18+ Solo per adulti. Il gioco può creare dipendenza. Gioca responsabilmente.',
            'affiliate_disclosure' => 'Questo sito contiene link affiliati. Potremmo ricevere una commissione senza costi aggiuntivi per te quando ti registri tramite i nostri link.',
            'responsible_gambling' => 'Se il gioco diventa un problema, cerca aiuto. Visita il Telefono Verde contro il gioco d\'azzardo (800 558822) o ALEA (www.aleaitalia.it).'
        ],
        'highlights_map' => [
            'Live Casino'=>'Casinò Live','Sports Betting'=>'Scommesse Sportive','Fast Payouts'=>'Pagamenti Rapidi','Mobile App'=>'App Mobile',
            'Weekly Cashback'=>'Cashback Settimanale','Tournaments'=>'Tornei','Fast Withdrawal'=>'Prelievo Rapido','Sports & Casino'=>'Sport e Casinò',
            'Live Betting'=>'Scommesse Live','Chicken Road Game'=>'Gioco Chicken Road','Weekly Reload'=>'Ricarica Settimanale','Crypto Casino'=>'Casinò Crypto',
            'High Bonus'=>'Alto Bonus','Poker Games'=>'Giochi di Poker','5000+ Games'=>'5000+ Giochi','No Deposit Bonus'=>'Bonus Senza Deposito',
            'Crypto Accepted'=>'Crypto Accettato','VIP Program'=>'Programma VIP','No Deposit Spins'=>'Giri Senza Deposito','Slots Specialist'=>'Specialista Slot',
            'Mobile Optimized'=>'Ottimizzato Mobile','Daily Promotions'=>'Promozioni Giornaliere','Esports'=>'Esports','Crypto Payments'=>'Pagamenti Crypto',
            'Seasonal Promotions'=>'Promozioni Stagionali','Table Games'=>'Giochi da Tavolo','Slots'=>'Slot','Online Casino'=>'Casinò Online'
        ]
    ],
    'el' => [
        'title' => 'Καλύτερα Μπόνους Καζίνο & Δωρεάν Περιστροφές 2026',
        'description' => 'Συγκρίνετε τα καλύτερα μπόνους καζίνο 2026. Δωρεάν περιστροφές χωρίς κατάθεση, κωδικοί promo & προσφορές καλωσορίσματος. Αποκτήστε τώρα!',
        'keywords' => 'online καζίνο, μπόνους καζίνο, δωρεάν περιστροφές, χωρίς κατάθεση, κωδικός promo, στοιχήματα, αθλητικά, καζίνο 2026, καλύτερες αποδόσεις, πραγματικά χρήματα',
        'h1' => 'Καλύτερα Μπόνους Καζίνο 2026',
        'subtitle' => 'Ανακαλύψτε αποκλειστικά μπόνους έως €600 και 200 δωρεάν περιστροφές. Προσφορές χωρίς κατάθεση — ξεκινήστε να κερδίζετε!',
        'trust' => ['🔒 Αδειοδοτημένα καζίνο','⚡ Γρήγορες αναλήψεις','📱 Καζίνο για κινητά','🎁 Μπόνους χωρίς κατάθεση','✅ Επαληθευμένο από ειδικούς'],
        'nav' => ['all'=>'🏠 Όλες οι προσφορές','reg'=>'🎁 Μπόνους εγγραφής','bonus'=>'💰 Μπόνους','free'=>'🆓 Χωρίς κατάθεση','slots'=>'🎰 Φρουτάκια','jackpot'=>'💎 Τζάκποτ','live'=>'🃏 Live Καζίνο','sport'=>'⚽ Αθλητικά','tourn'=>'🏆 Τουρνουά'],
        'categories' => [
            'reg'=>['label'=>'🎁 Εγγραφή','headline'=>'Εγγραφείτε & Κερδίστε Αμέσως','sub'=>'Γρήγορη εγγραφή με στιγμιαίες ανταμοιβές'],
            'bonus'=>['label'=>'💰 Μπόνους','headline'=>'Τα Μεγαλύτερα Μπόνους','sub'=>'Κορυφαίες προσφορές κατάθεσης'],
            'free'=>['label'=>'🆓 Χωρίς Κατάθεση','headline'=>'Μηδέν Ρίσκο, Πραγματικά Κέρδη','sub'=>'Δωρεάν περιστροφές χωρίς κατάθεση'],
            'slots'=>['label'=>'🎰 Φρουτάκια','headline'=>'Παίξτε & Κερδίστε Στιγμιαία','sub'=>'Κορυφαία φρουτάκια με υψηλά RTP'],
            'jackpot'=>['label'=>'💎 Τζάκποτ','headline'=>'Τζάκποτ που Αλλάζουν Ζωές','sub'=>'Προοδευτικά τζάκποτ εκατομμυρίων'],
            'live'=>['label'=>'🃏 Live Καζίνο','headline'=>'Πραγματικοί Ντίλερ, Αληθινά Κέρδη','sub'=>'Live blackjack, ρουλέτα και μπακαρά'],
            'sport'=>['label'=>'⚽ Αθλητικά','headline'=>'Καλύτερες Αποδόσεις Στοιχήματος','sub'=>'Ποδόσφαιρο, τένις και live στοιχήματα'],
            'tourn'=>['label'=>'🏆 Τουρνουά','headline'=>'Διαγωνιστείτε για Μεγάλα Έπαθλα','sub'=>'Τουρνουά καζίνο και αθλητικών'],
            'main'=>['label'=>'🏠 Γενικά','headline'=>'Εξερευνήστε Κορυφαία Καζίνο','sub'=>'Αρχική, κανόνες και πληροφορίες']
        ],
        'cta' => 'Αποκτήστε',
        'seo_text' => [
            'about_h2' => 'Ο οδηγός σας για τα καλύτερα μπόνους καζίνο 2026',
            'about_p1' => 'Καλώς ήρθατε στον απόλυτο προορισμό για τα καλύτερα μπόνους καζίνο. Συγκρίνουμε εκατοντάδες προσφορές από αδειοδοτημένα καζίνο για να σας φέρουμε αποκλειστικά μπόνους καλωσορίσματος, δωρεάν περιστροφές χωρίς κατάθεση και κωδικούς promo. Είτε προτιμάτε φρουτάκια, live dealer παιχνίδια ή αθλητικά στοιχήματα, η λίστα μας σας βοηθά να βρείτε το τέλειο μπόνους.',
            'about_p2' => 'Κάθε καζίνο στην πλατφόρμα μας κατέχει έγκυρη άδεια από αρχές όπως η Malta Gaming Authority (MGA) ή Curacao eGaming. Επαληθεύουμε τα μέτρα ασφαλείας, τους χρόνους πληρωμής και την ποιότητα εξυπηρέτησης. Η ασφάλειά σας είναι η προτεραιότητά μας — προτείνουμε μόνο καζίνο με κρυπτογράφηση SSL και εργαλεία υπεύθυνου παιχνιδιού.',
            'about_p3' => 'Η κατανόηση των απαιτήσεων στοιχηματισμού είναι κλειδί. Wagering 35x σημαίνει πονταρίσματα 35 φορές το μπόνους. Επισκεφθείτε τη <a href="#bonus">ενότητα μπόνους</a> για τις καλύτερες προσφορές, ή εξερευνήστε τις <a href="#free">προσφορές χωρίς κατάθεση</a>. Διαβάζετε πάντα τους όρους και συγκρίνετε τις ελάχιστες καταθέσεις.'
        ],
        'faq' => [
            ['q'=>'Ποιο είναι το καλύτερο μπόνους καζίνο 2026;','a'=>'Τα καλύτερα μπόνους 2026 προσφέρουν έως €600 με 200 δωρεάν περιστροφές. Η Casinia προσφέρει 100% έως €500 + 200 spins με άδεια MGA, η Spinanga 200% έως €600. Συγκρίνετε όλες τις προσφορές στο site μας.'],
            ['q'=>'Πώς χρησιμοποιώ κωδικό promo;','a'=>'Αντιγράψτε τον κωδικό (π.χ. RABONA20 ή CASINIA30) και επικολλήστε τον κατά την εγγραφή ή στο ταμείο. Ορισμένοι κωδικοί ενεργοποιούν αυτόματα δωρεάν περιστροφές. Ελέγξτε αν πρέπει να εισαχθεί κατά την εγγραφή ή την κατάθεση.'],
            ['q'=>'Τι σημαίνει απαίτηση στοιχηματισμού;','a'=>'Απαίτηση 35x σημαίνει ότι πρέπει να ποντάρετε 35 φορές το μπόνους πριν κάνετε ανάληψη. Για μπόνους €100 με 35x απαιτούνται €3.500 σε στοιχήματα. Χαμηλότερες απαιτήσεις όπως 30x είναι πιο ευνοϊκές.'],
            ['q'=>'Είναι ασφαλή αυτά τα καζίνο;','a'=>'Ναι, όλα τα καζίνο μας έχουν άδειες από MGA ή Curacao eGaming. Χρησιμοποιούν κρυπτογράφηση SSL, προσφέρουν εργαλεία υπεύθυνου παιχνιδιού και ελέγχονται τακτικά.'],
            ['q'=>'Πόσο γρήγορα μπορώ να κάνω ανάληψη;','a'=>'Τα e-wallets και crypto επεξεργάζονται σε 24 ώρες. Οι τραπεζικές μεταφορές χρειάζονται 2-5 εργάσιμες ημέρες. Τα περισσότερα καζίνο μας είναι γνωστά για γρήγορες αναλήψεις.'],
            ['q'=>'Μπορώ να παίξω από κινητό;','a'=>'Φυσικά! Όλα τα καζίνο είναι βελτιστοποιημένα για κινητά. Παίξτε, καταθέστε, αξιοποιήστε μπόνους και κάντε ανάληψη από το κινητό σας. Ορισμένα καζίνο προσφέρουν και εφαρμογές.']
        ],
        'footer' => [
            'disclaimer_18' => '18+ Μόνο για ενήλικες. Τα τυχερά παιχνίδια μπορεί να προκαλέσουν εθισμό. Παίξτε υπεύθυνα.',
            'affiliate_disclosure' => 'Αυτός ο ιστότοπος περιέχει συνδέσμους συνεργατών. Ενδέχεται να λάβουμε προμήθεια χωρίς επιπλέον κόστος για εσάς.',
            'responsible_gambling' => 'Αν το παιχνίδι γίνεται πρόβλημα, ζητήστε βοήθεια. Επισκεφθείτε το ΚΕΘΕΑ (www.kethea.gr) ή GamCare (www.gamcare.org.uk).'
        ],
        'highlights_map' => [
            'Live Casino'=>'Live Καζίνο','Sports Betting'=>'Αθλητικά Στοιχήματα','Fast Payouts'=>'Γρήγορες Πληρωμές','Mobile App'=>'Εφαρμογή Κινητού',
            'Weekly Cashback'=>'Εβδομαδιαίο Cashback','Tournaments'=>'Τουρνουά','Fast Withdrawal'=>'Γρήγορη Ανάληψη','Sports & Casino'=>'Αθλητικά & Καζίνο',
            'Live Betting'=>'Live Στοιχήματα','Chicken Road Game'=>'Παιχνίδι Chicken Road','Weekly Reload'=>'Εβδομαδιαίο Reload','Crypto Casino'=>'Κρυπτο Καζίνο',
            'High Bonus'=>'Υψηλό Μπόνους','Poker Games'=>'Παιχνίδια Πόκερ','5000+ Games'=>'5000+ Παιχνίδια','No Deposit Bonus'=>'Μπόνους Χωρίς Κατάθεση',
            'Crypto Accepted'=>'Κρυπτό Αποδεκτό','VIP Program'=>'Πρόγραμμα VIP','No Deposit Spins'=>'Spins Χωρίς Κατάθεση','Slots Specialist'=>'Ειδικός Φρουτάκια',
            'Mobile Optimized'=>'Βελτιστοποιημένο Κινητό','Daily Promotions'=>'Καθημερινές Προσφορές','Esports'=>'Esports','Crypto Payments'=>'Κρυπτο Πληρωμές',
            'Seasonal Promotions'=>'Εποχιακές Προσφορές','Table Games'=>'Επιτραπέζια','Slots'=>'Φρουτάκια','Online Casino'=>'Online Καζίνο'
        ]
    ],
    'pl' => [
        'title' => 'Najlepsze Bonusy Kasynowe & Darmowe Spiny 2026',
        'description' => 'Porównaj najlepsze bonusy kasyn online 2026. Darmowe spiny bez depozytu, kody promocyjne i bonusy powitalne. Odbierz swój bonus!',
        'keywords' => 'kasyno online, bonus kasynowy, darmowe spiny, bez depozytu, kod promocyjny, bonus powitalny, prawdziwe pieniądze, najlepsze kasyna, zakłady sportowe, kasyno 2026',
        'h1' => 'Najlepsze Bonusy Kasynowe 2026',
        'subtitle' => 'Odkryj ekskluzywne bonusy do €600 i 200 darmowych spinów. Oferty bez depozytu — zacznij wygrywać już dziś!',
        'trust' => ['🔒 Licencjonowane kasyna','⚡ Szybkie wypłaty gwarantowane','📱 Kasyno mobilne','🎁 Bonus bez depozytu','✅ Zweryfikowane przez ekspertów'],
        'nav' => ['all'=>'🏠 Wszystkie oferty','reg'=>'🎁 Bonus rejestracyjny','bonus'=>'💰 Bonusy','free'=>'🆓 Bez depozytu','slots'=>'🎰 Automaty','jackpot'=>'💎 Jackpoty','live'=>'🃏 Live kasyno','sport'=>'⚽ Zakłady','tourn'=>'🏆 Turnieje'],
        'categories' => [
            'reg'=>['label'=>'🎁 Rejestracja','headline'=>'Zarejestruj się i Odbierz','sub'=>'Szybka rejestracja z natychmiastowymi nagrodami'],
            'bonus'=>['label'=>'💰 Bonusy','headline'=>'Największe Bonusy Powitalne','sub'=>'Najlepsze oferty wpłatowe i pakiety spinów'],
            'free'=>['label'=>'🆓 Bez Depozytu','headline'=>'Zero Ryzyka, Prawdziwe Nagrody','sub'=>'Darmowe spiny i bonusy bez depozytu'],
            'slots'=>['label'=>'🎰 Automaty','headline'=>'Kręć i Wygrywaj Natychmiast','sub'=>'Najlepsze automaty z wysokim RTP'],
            'jackpot'=>['label'=>'💎 Jackpoty','headline'=>'Jackpoty Zmieniające Życie','sub'=>'Progresywne jackpoty warte miliony'],
            'live'=>['label'=>'🃏 Live Kasyno','headline'=>'Prawdziwi Krupierzy, Prawdziwe Wygrane','sub'=>'Live blackjack, ruletka i bakarat'],
            'sport'=>['label'=>'⚽ Zakłady','headline'=>'Najlepsze Kursy, Największe Wygrane','sub'=>'Piłka nożna, tenis i zakłady na żywo'],
            'tourn'=>['label'=>'🏆 Turnieje','headline'=>'Rywalizuj o Wielkie Nagrody','sub'=>'Turnieje kasynowe i sportowe'],
            'main'=>['label'=>'🏠 Ogólne','headline'=>'Odkryj Najlepsze Kasyna','sub'=>'Strona główna, regulamin i informacje']
        ],
        'cta' => 'Odbierz Teraz',
        'seo_text' => [
            'about_h2' => 'Twój przewodnik po najlepszych bonusach kasynowych 2026',
            'about_p1' => 'Witamy na Twojej najlepszej platformie do znajdowania bonusów kasyn online. Porównujemy setki ofert z licencjonowanych kasyn, dostarczając ekskluzywne bonusy powitalne, darmowe spiny bez depozytu i działające kody promocyjne. Czy wolisz automaty, gry z krupierem na żywo czy zakłady sportowe — nasza lista pomoże Ci znaleźć idealny bonus.',
            'about_p2' => 'Każde kasyno posiada ważną licencję od Malta Gaming Authority (MGA) lub Curacao eGaming. Weryfikujemy zabezpieczenia, czasy wypłat i jakość obsługi klienta. Twoje bezpieczeństwo jest priorytetem — polecamy tylko kasyna z szyfrowaniem SSL i narzędziami odpowiedzialnej gry.',
            'about_p3' => 'Zrozumienie warunków obrotu jest kluczowe. Wagering 35x oznacza postawienie 35 razy kwoty bonusu przed wypłatą. Odwiedź naszą <a href="#bonus">sekcję bonusów</a> dla najlepszych ofert lub sprawdź <a href="#free">oferty bez depozytu</a>. Zawsze czytaj regulamin i porównuj minimalne depozyty.'
        ],
        'faq' => [
            ['q'=>'Jaki jest najlepszy bonus kasynowy 2026?','a'=>'Najlepsze bonusy 2026 oferują do €600 z 200 darmowymi spinami. Casinia oferuje 100% do €500 + 200 spinów z licencją MGA, Spinanga 200% do €600. Porównaj wszystkie oferty na naszej stronie.'],
            ['q'=>'Jak użyć kodu promocyjnego kasyna?','a'=>'Skopiuj kod z naszej strony (np. RABONA20 lub CASINIA30) i wklej go podczas rejestracji lub w sekcji kasowej. Niektóre kody automatycznie aktywują darmowe spiny. Sprawdź czy kod trzeba wpisać przy rejestracji czy przy pierwszym depozycie.'],
            ['q'=>'Co oznacza warunek obrotu?','a'=>'Warunek obrotu (np. 35x) oznacza konieczność postawienia tej wielokrotności bonusu przed wypłatą. Dla bonusu €100 z 35x potrzeba €3.500 w zakładach. Niższe wymagania jak 30x są korzystniejsze. Automaty liczą się zwykle w 100%.'],
            ['q'=>'Czy te kasyna online są bezpieczne?','a'=>'Tak, wszystkie kasyna posiadają licencje MGA lub Curacao eGaming. Stosują szyfrowanie SSL, oferują narzędzia odpowiedzialnej gry i są regularnie audytowane.'],
            ['q'=>'Jak szybko mogę wypłacić wygrane?','a'=>'E-portfele i krypto są przetwarzane w 24h. Przelewy bankowe trwają 2-5 dni roboczych. Większość kasyn na naszej liście jest znana z szybkich wypłat.'],
            ['q'=>'Czy mogę grać na telefonie?','a'=>'Oczywiście! Wszystkie polecane kasyna są w pełni zoptymalizowane pod kątem gry mobilnej. Graj, wpłacaj, odbieraj bonusy i wypłacaj z poziomu smartfona.']
        ],
        'footer' => [
            'disclaimer_18' => '18+ Tylko dla dorosłych. Hazard może uzależniać. Graj odpowiedzialnie.',
            'affiliate_disclosure' => 'Ta strona zawiera linki afiliacyjne. Możemy otrzymać prowizję bez dodatkowych kosztów dla Ciebie.',
            'responsible_gambling' => 'Jeśli hazard staje się problemem, szukaj pomocy. Odwiedź Anonimowych Hazardzistów lub GamCare (www.gamcare.org.uk).'
        ],
        'highlights_map' => [
            'Live Casino'=>'Kasyno na Żywo','Sports Betting'=>'Zakłady Sportowe','Fast Payouts'=>'Szybkie Wypłaty','Mobile App'=>'Aplikacja Mobilna',
            'Weekly Cashback'=>'Tygodniowy Cashback','Tournaments'=>'Turnieje','Fast Withdrawal'=>'Szybka Wypłata','Sports & Casino'=>'Sport i Kasyno',
            'Live Betting'=>'Zakłady na Żywo','Chicken Road Game'=>'Gra Chicken Road','Weekly Reload'=>'Tygodniowy Reload','Crypto Casino'=>'Krypto Kasyno',
            'High Bonus'=>'Wysoki Bonus','Poker Games'=>'Gry Pokerowe','5000+ Games'=>'5000+ Gier','No Deposit Bonus'=>'Bonus Bez Depozytu',
            'Crypto Accepted'=>'Krypto Akceptowane','VIP Program'=>'Program VIP','No Deposit Spins'=>'Spiny Bez Depozytu','Slots Specialist'=>'Specjalista Automatów',
            'Mobile Optimized'=>'Zoptymalizowane Mobilnie','Daily Promotions'=>'Codzienne Promocje','Esports'=>'Esporty','Crypto Payments'=>'Płatności Krypto',
            'Seasonal Promotions'=>'Sezonowe Promocje','Table Games'=>'Gry Stołowe','Slots'=>'Automaty','Online Casino'=>'Kasyno Online'
        ]
    ],
    'es' => [
        'title' => 'Mejores Bonos Casino & Giros Gratis 2026',
        'description' => 'Compara los mejores bonos de casino online 2026. Giros gratis sin depósito, códigos promo y ofertas de bienvenida exclusivas. ¡Reclama tu bono!',
        'keywords' => 'casino online, bono casino, giros gratis, sin depósito, código promo, bono bienvenida, dinero real, mejores casinos, apuestas deportivas, casino 2026',
        'h1' => 'Mejores Bonos Casino 2026',
        'subtitle' => 'Descubre bonos exclusivos de hasta €600 y 200 giros gratis. Ofertas sin depósito disponibles — ¡empieza a ganar hoy!',
        'trust' => ['🔒 Casinos con licencia y regulados','⚡ Retiros rápidos garantizados','📱 Casino móvil disponible','🎁 Bono sin depósito','✅ Verificado por expertos'],
        'nav' => ['all'=>'🏠 Todas las ofertas','reg'=>'🎁 Bono registro','bonus'=>'💰 Bonos','free'=>'🆓 Sin depósito','slots'=>'🎰 Tragamonedas','jackpot'=>'💎 Jackpots','live'=>'🃏 Casino en vivo','sport'=>'⚽ Apuestas','tourn'=>'🏆 Torneos'],
        'categories' => [
            'reg'=>['label'=>'🎁 Registro','headline'=>'Regístrate y Gana al Instante','sub'=>'Bonus de registro rápido con premios al instante'],
            'bonus'=>['label'=>'💰 Bonos','headline'=>'Los Mayores Bonos Bienvenida','sub'=>'Mejores ofertas de depósito y giros gratis'],
            'free'=>['label'=>'🆓 Sin Depósito','headline'=>'Sin Riesgo, Premios Reales','sub'=>'Giros gratis y bonos sin depositar'],
            'slots'=>['label'=>'🎰 Tragamonedas','headline'=>'Gira y Gana al Instante','sub'=>'Los mejores slots con alto RTP'],
            'jackpot'=>['label'=>'💎 Jackpots','headline'=>'Jackpots que Cambian Vidas','sub'=>'Jackpots progresivos de millones'],
            'live'=>['label'=>'🃏 Casino en Vivo','headline'=>'Crupieres Reales, Ganancias Reales','sub'=>'Blackjack, ruleta y baccarat en vivo'],
            'sport'=>['label'=>'⚽ Apuestas','headline'=>'Mejores Cuotas, Mayores Premios','sub'=>'Fútbol, tenis y apuestas en vivo'],
            'tourn'=>['label'=>'🏆 Torneos','headline'=>'Compite por Grandes Premios','sub'=>'Eventos de casino y torneos deportivos'],
            'main'=>['label'=>'🏠 General','headline'=>'Explora los Mejores Casinos','sub'=>'Página principal, reglas e información']
        ],
        'cta' => 'Reclama Ahora',
        'seo_text' => [
            'about_h2' => 'Tu guía de los mejores bonos casino online 2026',
            'about_p1' => 'Bienvenido a tu destino definitivo para encontrar los mejores bonos de casino online. Comparamos cientos de ofertas de casinos con licencia para traerte bonos de bienvenida exclusivos, giros gratis sin depósito y códigos promo que funcionan. Ya prefieras tragamonedas, juegos con crupier en vivo o apuestas deportivas, nuestra lista te ayuda a maximizar tu experiencia.',
            'about_p2' => 'Cada casino tiene licencia válida de autoridades como la Malta Gaming Authority (MGA) o Curacao eGaming. Verificamos las medidas de seguridad, tiempos de pago y calidad del servicio. Tu seguridad es prioridad — solo recomendamos casinos con cifrado SSL y herramientas de juego responsable.',
            'about_p3' => 'Entender los requisitos de apuesta es clave. Un wagering de 35x significa apostar 35 veces el bono antes de retirar. Visita nuestra <a href="#bonus">sección de bonos</a> o explora <a href="#free">ofertas sin depósito</a> para jugar sin riesgo. Lee siempre los términos y compara los depósitos mínimos.'
        ],
        'faq' => [
            ['q'=>'¿Cuál es el mejor bono casino online 2026?','a'=>'Los mejores bonos 2026 ofrecen hasta €600 con 200 giros gratis. Casinia ofrece 100% hasta €500 + 200 giros con licencia MGA, Spinanga 200% hasta €600. Compara todas las ofertas en nuestro sitio.'],
            ['q'=>'¿Cómo uso un código promo casino?','a'=>'Copia el código de nuestro sitio (ej: RABONA20 o CASINIA30) y pégalo al registrarte o en la sección de caja. Algunos códigos activan giros gratis automáticamente. Verifica si hay que ingresarlo al registrarse o al depositar.'],
            ['q'=>'¿Qué significa requisito de apuesta?','a'=>'Un requisito de 35x significa apostar 35 veces el bono antes de retirar. Para un bono de €100 a 35x necesitas €3.500 en apuestas. Requisitos más bajos como 30x son más favorables.'],
            ['q'=>'¿Son seguros estos casinos online?','a'=>'Sí, todos los casinos tienen licencias MGA o Curacao eGaming. Usan cifrado SSL, ofrecen herramientas de juego responsable y son auditados regularmente.'],
            ['q'=>'¿Cuánto tardan los retiros?','a'=>'E-wallets y crypto se procesan en 24 horas. Transferencias bancarias tardan 2-5 días hábiles. La mayoría de nuestros casinos son conocidos por retiros rápidos.'],
            ['q'=>'¿Puedo jugar desde el móvil?','a'=>'¡Por supuesto! Todos los casinos recomendados están optimizados para móvil. Juega, deposita, reclama bonos y retira desde tu smartphone.']
        ],
        'footer' => [
            'disclaimer_18' => '18+ Solo para adultos. El juego puede ser adictivo. Juega con responsabilidad.',
            'affiliate_disclosure' => 'Este sitio contiene enlaces de afiliados. Podemos recibir una comisión sin costo adicional para ti.',
            'responsible_gambling' => 'Si el juego se convierte en un problema, busca ayuda. Visita Jugarbien.es o FEJAR (www.fejar.org).'
        ],
        'highlights_map' => [
            'Live Casino'=>'Casino en Vivo','Sports Betting'=>'Apuestas Deportivas','Fast Payouts'=>'Pagos Rápidos','Mobile App'=>'App Móvil',
            'Weekly Cashback'=>'Cashback Semanal','Tournaments'=>'Torneos','Fast Withdrawal'=>'Retiro Rápido','Sports & Casino'=>'Deportes y Casino',
            'Live Betting'=>'Apuestas en Vivo','Chicken Road Game'=>'Juego Chicken Road','Weekly Reload'=>'Recarga Semanal','Crypto Casino'=>'Casino Crypto',
            'High Bonus'=>'Alto Bonus','Poker Games'=>'Juegos de Poker','5000+ Games'=>'5000+ Juegos','No Deposit Bonus'=>'Bono Sin Depósito',
            'Crypto Accepted'=>'Crypto Aceptado','VIP Program'=>'Programa VIP','No Deposit Spins'=>'Giros Sin Depósito','Slots Specialist'=>'Especialista Slots',
            'Mobile Optimized'=>'Optimizado Móvil','Daily Promotions'=>'Promociones Diarias','Esports'=>'Esports','Crypto Payments'=>'Pagos Crypto',
            'Seasonal Promotions'=>'Promociones de Temporada','Table Games'=>'Juegos de Mesa','Slots'=>'Tragamonedas','Online Casino'=>'Casino Online'
        ]
    ],
];

// Add remaining languages with more compact format
$translations['ar'] = [
    'title' => 'أفضل مكافآت الكازينو والدورات المجانية 2026',
    'description' => 'قارن أفضل مكافآت الكازينو أونلاين 2026. دورات مجانية بدون إيداع، أكواد ترويجية وعروض ترحيبية حصرية. احصل على مكافأتك الآن!',
    'keywords' => 'كازينو أونلاين, مكافأة كازينو, دورات مجانية, بدون إيداع, كود ترويجي, مكافأة ترحيبية, مال حقيقي, أفضل الكازينوهات, رهانات رياضية, كازينو 2026',
    'h1' => 'أفضل مكافآت الكازينو 2026',
    'subtitle' => 'اكتشف مكافآت حصرية حتى €600 و200 دورة مجانية. عروض بدون إيداع متاحة — ابدأ الفوز الآن!',
    'trust' => ['🔒 كازينوهات مرخصة ومنظمة','⚡ سحوبات سريعة مضمونة','📱 كازينو متوافق مع الجوال','🎁 مكافأة بدون إيداع','✅ تم التحقق من الخبراء'],
    'nav' => ['all'=>'🏠 جميع العروض','reg'=>'🎁 مكافأة التسجيل','bonus'=>'💰 المكافآت','free'=>'🆓 بدون إيداع','slots'=>'🎰 السلوتس','jackpot'=>'💎 الجاكبوت','live'=>'🃏 كازينو مباشر','sport'=>'⚽ الرياضة','tourn'=>'🏆 البطولات'],
    'categories' => [
        'reg'=>['label'=>'🎁 التسجيل','headline'=>'سجّل واحصل على مكافأتك','sub'=>'تسجيل سريع مع مكافآت فورية'],
        'bonus'=>['label'=>'💰 المكافآت','headline'=>'أكبر مكافآت الترحيب','sub'=>'أفضل عروض الإيداع والدورات المجانية'],
        'free'=>['label'=>'🆓 بدون إيداع','headline'=>'بدون مخاطر، أرباح حقيقية','sub'=>'دورات مجانية ومكافآت بدون إيداع'],
        'slots'=>['label'=>'🎰 السلوتس','headline'=>'أدِر واربح فوراً','sub'=>'أفضل ألعاب السلوتس بنسب ربح عالية'],
        'jackpot'=>['label'=>'💎 الجاكبوت','headline'=>'جاكبوتات تغيّر الحياة','sub'=>'جاكبوتات تقدمية بالملايين'],
        'live'=>['label'=>'🃏 كازينو مباشر','headline'=>'موزعون حقيقيون، أرباح حقيقية','sub'=>'بلاك جاك وروليت وباكاراه مباشر'],
        'sport'=>['label'=>'⚽ الرياضة','headline'=>'أفضل الاحتمالات، أكبر الأرباح','sub'=>'كرة القدم، التنس والرهانات المباشرة'],
        'tourn'=>['label'=>'🏆 البطولات','headline'=>'تنافس على الجوائز الكبرى','sub'=>'بطولات كازينو ورياضية'],
        'main'=>['label'=>'🏠 عام','headline'=>'استكشف أفضل الكازينوهات','sub'=>'الرئيسية والقواعد والمعلومات']
    ],
    'cta' => 'احصل الآن',
    'seo_text' => [
        'about_h2' => 'دليلك لأفضل مكافآت الكازينو أونلاين 2026',
        'about_p1' => 'مرحباً بك في وجهتك النهائية للعثور على أفضل مكافآت الكازينو أونلاين المتاحة حالياً. نقارن مئات العروض من كازينوهات مرخصة لنقدم لك مكافآت ترحيبية حصرية ودورات مجانية بدون إيداع وأكواد ترويجية تعمل فعلاً. سواء كنت تفضل السلوتس أو ألعاب الموزع المباشر أو الرهانات الرياضية، قائمتنا المختارة تساعدك في العثور على المكافأة المثالية.',
        'about_p2' => 'كل كازينو مدرج يحمل ترخيصاً صالحاً من سلطات محترمة مثل هيئة ألعاب مالطا (MGA) أو Curacao eGaming. نتحقق من إجراءات الأمان وأوقات الدفع وجودة خدمة العملاء. سلامتك هي أولويتنا.',
        'about_p3' => 'فهم متطلبات الرهان أمر أساسي. شرط 35x يعني المراهنة 35 مرة قبل السحب. زر <a href="#bonus">قسم المكافآت</a> لأفضل العروض، أو استكشف <a href="#free">عروض بدون إيداع</a> للعب بدون مخاطر.'
    ],
    'faq' => [
        ['q'=>'ما هي أفضل مكافأة كازينو 2026؟','a'=>'أفضل المكافآت تصل إلى €600 مع 200 دورة مجانية. Casinia تقدم 100% حتى €500 بترخيص MGA، وSpinanga 200% حتى €600. قارن جميع العروض على موقعنا.'],
        ['q'=>'كيف أستخدم كود الترويج؟','a'=>'انسخ الكود (مثل RABONA20 أو CASINIA30) والصقه عند التسجيل أو في قسم الكاشير. بعض الأكواد تفعّل الدورات المجانية تلقائياً.'],
        ['q'=>'ماذا تعني متطلبات الرهان؟','a'=>'متطلب 35x يعني أنك تحتاج للمراهنة 35 ضعف المكافأة قبل السحب. لمكافأة €100 بمتطلب 35x تحتاج €3,500 في الرهانات. متطلبات أقل مثل 30x أفضل.'],
        ['q'=>'هل هذه الكازينوهات آمنة؟','a'=>'نعم، جميع الكازينوهات مرخصة من MGA أو Curacao eGaming. تستخدم تشفير SSL وتوفر أدوات اللعب المسؤول.'],
        ['q'=>'كم يستغرق سحب الأرباح؟','a'=>'المحافظ الإلكترونية والكريبتو خلال 24 ساعة. التحويلات البنكية 2-5 أيام عمل.'],
        ['q'=>'هل يمكنني اللعب من الجوال؟','a'=>'بالطبع! جميع الكازينوهات محسّنة للجوال. العب وأودع واسحب مباشرة من متصفح هاتفك.']
    ],
    'footer' => [
        'disclaimer_18' => '+18 للبالغين فقط. القمار قد يسبب الإدمان. العب بمسؤولية.',
        'affiliate_disclosure' => 'يحتوي هذا الموقع على روابط تابعة. قد نتلقى عمولة دون تكلفة إضافية عليك.',
        'responsible_gambling' => 'إذا أصبح القمار مشكلة، اطلب المساعدة. تواصل مع GamCare (www.gamcare.org.uk).'
    ],
    'highlights_map' => [
        'Live Casino'=>'كازينو مباشر','Sports Betting'=>'رهانات رياضية','Fast Payouts'=>'دفعات سريعة','Mobile App'=>'تطبيق جوال',
        'Weekly Cashback'=>'كاشباك أسبوعي','Tournaments'=>'بطولات','Fast Withdrawal'=>'سحب سريع','Sports & Casino'=>'رياضة وكازينو',
        'Live Betting'=>'رهانات مباشرة','Chicken Road Game'=>'لعبة Chicken Road','Weekly Reload'=>'إعادة تحميل أسبوعية','Crypto Casino'=>'كازينو كريبتو',
        'High Bonus'=>'مكافأة عالية','Poker Games'=>'ألعاب بوكر','5000+ Games'=>'+5000 لعبة','No Deposit Bonus'=>'مكافأة بدون إيداع',
        'Crypto Accepted'=>'كريبتو مقبول','VIP Program'=>'برنامج VIP','No Deposit Spins'=>'دورات بدون إيداع','Slots Specialist'=>'متخصص سلوتس',
        'Mobile Optimized'=>'محسّن للجوال','Daily Promotions'=>'عروض يومية','Esports'=>'رياضات إلكترونية','Crypto Payments'=>'مدفوعات كريبتو',
        'Seasonal Promotions'=>'عروض موسمية','Table Games'=>'ألعاب طاولة','Slots'=>'سلوتس','Online Casino'=>'كازينو أونلاين'
    ]
];

// Portuguese
$translations['pt'] = [
    'title' => 'Melhores Bônus Cassino & Rodadas Grátis 2026',
    'description' => 'Compare os melhores bônus de cassino online 2026. Rodadas grátis sem depósito, códigos promo e ofertas de boas-vindas. Resgate seu bônus!',
    'keywords' => 'cassino online, bônus cassino, rodadas grátis, sem depósito, código promo, bônus boas-vindas, dinheiro real, melhores cassinos, apostas esportivas, cassino 2026',
    'h1' => 'Melhores Bônus Cassino 2026',
    'subtitle' => 'Descubra bônus exclusivos de até €600 e 200 rodadas grátis. Ofertas sem depósito disponíveis — comece a ganhar hoje!',
    'trust' => ['🔒 Cassinos licenciados e regulados','⚡ Saques rápidos garantidos','📱 Cassino móvel disponível','🎁 Bônus sem depósito','✅ Verificado por especialistas'],
    'nav' => ['all'=>'🏠 Todas as ofertas','reg'=>'🎁 Bônus registro','bonus'=>'💰 Bônus','free'=>'🆓 Sem depósito','slots'=>'🎰 Caça-níqueis','jackpot'=>'💎 Jackpots','live'=>'🃏 Cassino ao vivo','sport'=>'⚽ Apostas','tourn'=>'🏆 Torneios'],
    'categories' => [
        'reg'=>['label'=>'🎁 Registro','headline'=>'Cadastre-se e Ganhe Agora','sub'=>'Registro rápido com recompensas instantâneas'],
        'bonus'=>['label'=>'💰 Bônus','headline'=>'Os Maiores Bônus Boas-Vindas','sub'=>'Melhores ofertas de depósito e rodadas grátis'],
        'free'=>['label'=>'🆓 Sem Depósito','headline'=>'Zero Risco, Prêmios Reais','sub'=>'Rodadas grátis e bônus sem depósito'],
        'slots'=>['label'=>'🎰 Caça-Níqueis','headline'=>'Gire e Ganhe Instantaneamente','sub'=>'Melhores slots com altos RTPs'],
        'jackpot'=>['label'=>'💎 Jackpots','headline'=>'Jackpots que Mudam Vidas','sub'=>'Jackpots progressivos de milhões'],
        'live'=>['label'=>'🃏 Cassino ao Vivo','headline'=>'Dealers Reais, Ganhos Reais','sub'=>'Blackjack, roleta e bacará ao vivo'],
        'sport'=>['label'=>'⚽ Apostas','headline'=>'Melhores Odds, Maiores Ganhos','sub'=>'Futebol, tênis e apostas ao vivo'],
        'tourn'=>['label'=>'🏆 Torneios','headline'=>'Compita por Grandes Prêmios','sub'=>'Eventos de cassino e torneios esportivos'],
        'main'=>['label'=>'🏠 Geral','headline'=>'Explore os Melhores Cassinos','sub'=>'Página inicial, regras e informações']
    ],
    'cta' => 'Resgatar Agora',
    'seo_text' => [
        'about_h2' => 'Seu guia dos melhores bônus de cassino online 2026',
        'about_p1' => 'Bem-vindo ao seu destino definitivo para encontrar os melhores bônus de cassino online. Comparamos centenas de ofertas de cassinos licenciados para trazer bônus de boas-vindas exclusivos, rodadas grátis sem depósito e códigos promo que funcionam. Seja caça-níqueis, jogos ao vivo ou apostas esportivas, nossa lista ajuda a maximizar sua experiência.',
        'about_p2' => 'Cada cassino tem licença válida da Malta Gaming Authority (MGA) ou Curacao eGaming. Verificamos segurança, tempos de pagamento e qualidade do suporte. Sua segurança é prioridade — recomendamos apenas cassinos com SSL e ferramentas de jogo responsável.',
        'about_p3' => 'Entender os requisitos de apostas é essencial. Wagering de 35x significa apostar 35 vezes o bônus. Visite nossa <a href="#bonus">seção de bônus</a> ou explore <a href="#free">ofertas sem depósito</a> para jogar sem risco. Leia sempre os termos.'
    ],
    'faq' => [
        ['q'=>'Qual é o melhor bônus cassino 2026?','a'=>'Os melhores bônus 2026 oferecem até €600 com 200 rodadas grátis. Casinia oferece 100% até €500 + 200 rodadas com licença MGA, Spinanga 200% até €600. Compare todas as ofertas.'],
        ['q'=>'Como usar um código promo?','a'=>'Copie o código (ex: RABONA20 ou CASINIA30) e cole ao se registrar ou na seção de caixa. Alguns códigos ativam rodadas grátis automaticamente.'],
        ['q'=>'O que significa requisito de aposta?','a'=>'Requisito de 35x significa apostar 35 vezes o bônus antes de sacar. Para bônus de €100 a 35x, são €3.500 em apostas. Requisitos menores como 30x são melhores.'],
        ['q'=>'Esses cassinos são seguros?','a'=>'Sim, todos têm licenças MGA ou Curacao eGaming. Usam SSL, oferecem ferramentas de jogo responsável e são auditados regularmente.'],
        ['q'=>'Quanto tempo para sacar ganhos?','a'=>'E-wallets e cripto em 24 horas. Transferências bancárias 2-5 dias úteis. A maioria dos cassinos é conhecida por saques rápidos.'],
        ['q'=>'Posso jogar no celular?','a'=>'Com certeza! Todos os cassinos são otimizados para celular. Jogue, deposite e saque do seu smartphone.']
    ],
    'footer' => [
        'disclaimer_18' => '18+ Apenas para adultos. Jogos de azar podem causar dependência. Jogue com responsabilidade.',
        'affiliate_disclosure' => 'Este site contém links de afiliados. Podemos receber comissão sem custo extra para você.',
        'responsible_gambling' => 'Se o jogo se tornar um problema, busque ajuda. Visite Jogadores Anônimos ou GamCare (www.gamcare.org.uk).'
    ],
    'highlights_map' => [
        'Live Casino'=>'Cassino ao Vivo','Sports Betting'=>'Apostas Esportivas','Fast Payouts'=>'Pagamentos Rápidos','Mobile App'=>'App Móvel',
        'Weekly Cashback'=>'Cashback Semanal','Tournaments'=>'Torneios','Fast Withdrawal'=>'Saque Rápido','Sports & Casino'=>'Esportes e Cassino',
        'Live Betting'=>'Apostas ao Vivo','Chicken Road Game'=>'Jogo Chicken Road','Weekly Reload'=>'Recarga Semanal','Crypto Casino'=>'Cassino Cripto',
        'High Bonus'=>'Bônus Alto','Poker Games'=>'Jogos de Poker','5000+ Games'=>'5000+ Jogos','No Deposit Bonus'=>'Bônus Sem Depósito',
        'Crypto Accepted'=>'Cripto Aceito','VIP Program'=>'Programa VIP','No Deposit Spins'=>'Rodadas Sem Depósito','Slots Specialist'=>'Especialista Slots',
        'Mobile Optimized'=>'Otimizado Mobile','Daily Promotions'=>'Promoções Diárias','Esports'=>'Esports','Crypto Payments'=>'Pagamentos Cripto',
        'Seasonal Promotions'=>'Promoções Sazonais','Table Games'=>'Jogos de Mesa','Slots'=>'Caça-Níqueis','Online Casino'=>'Cassino Online'
    ]
];

// Hungarian
$translations['hu'] = [
    'title' => 'Legjobb Kaszinó Bónuszok & Ingyenes Pörgetések 2026',
    'description' => 'Hasonlítsd össze a legjobb kaszinó bónuszokat 2026-ban. Befizetés nélküli pörgetések, promó kódok és üdvözlő bónuszok. Szerezd meg most!',
    'keywords' => 'online kaszinó, kaszinó bónusz, ingyenes pörgetések, befizetés nélkül, promó kód, üdvözlő bónusz, valódi pénz, legjobb kaszinók, sportfogadás, kaszinó 2026',
    'h1' => 'Legjobb Kaszinó Bónuszok 2026',
    'subtitle' => 'Fedezd fel az exkluzív bónuszokat €600-ig és 200 ingyenes pörgetést. Befizetés nélküli ajánlatok — kezdj el nyerni!',
    'trust' => ['🔒 Engedélyezett kaszinók','⚡ Gyors kifizetések garantálva','📱 Mobil kaszinó elérhető','🎁 Befizetés nélküli bónusz','✅ Szakértők által ellenőrizve'],
    'nav' => ['all'=>'🏠 Összes ajánlat','reg'=>'🎁 Regisztrációs bónusz','bonus'=>'💰 Bónuszok','free'=>'🆓 Befizetés nélkül','slots'=>'🎰 Nyerőgépek','jackpot'=>'💎 Jackpotok','live'=>'🃏 Élő kaszinó','sport'=>'⚽ Sport','tourn'=>'🏆 Versenyek'],
    'categories' => [
        'reg'=>['label'=>'🎁 Regisztráció','headline'=>'Regisztrálj és Nyerj Azonnal','sub'=>'Gyors regisztráció azonnali jutalmakkal'],
        'bonus'=>['label'=>'💰 Bónuszok','headline'=>'Legnagyobb Üdvözlő Bónuszok','sub'=>'Legjobb befizetési ajánlatok és spinek'],
        'free'=>['label'=>'🆓 Befizetés Nélkül','headline'=>'Nulla Kockázat, Valódi Nyeremények','sub'=>'Ingyenes pörgetések befizetés nélkül'],
        'slots'=>['label'=>'🎰 Nyerőgépek','headline'=>'Pörgets és Nyerj Azonnal','sub'=>'Legjobb nyerőgépek magas RTP-vel'],
        'jackpot'=>['label'=>'💎 Jackpotok','headline'=>'Életváltoztató Jackpotok','sub'=>'Milliós progresszív jackpotok'],
        'live'=>['label'=>'🃏 Élő Kaszinó','headline'=>'Igazi Osztók, Igazi Nyeremények','sub'=>'Élő blackjack, rulett és baccarat'],
        'sport'=>['label'=>'⚽ Sport','headline'=>'Legjobb Szorzók, Legnagyobb Nyeremények','sub'=>'Futball, tenisz és élő fogadások'],
        'tourn'=>['label'=>'🏆 Versenyek','headline'=>'Versenyezz Nagy Nyereményekért','sub'=>'Kaszinó és sport versenyek'],
        'main'=>['label'=>'🏠 Általános','headline'=>'Fedezd Fel a Top Kaszinókat','sub'=>'Főoldal, szabályzat és információk']
    ],
    'cta' => 'Szerezd Meg',
    'seo_text' => [
        'about_h2' => 'Útmutatód a legjobb kaszinó bónuszokhoz 2026-ban',
        'about_p1' => 'Üdvözlünk a legjobb online kaszinó bónuszok kereső oldalán. Összehasonlítunk százával ajánlatokat engedélyezett kaszinóktól, hogy exkluzív üdvözlő bónuszokat, befizetés nélküli pörgetéseket és működő promó kódokat hozzunk neked. Akár nyerőgépeket, élő osztós játékokat vagy sportfogadást preferálsz.',
        'about_p2' => 'Minden kaszinó érvényes engedéllyel rendelkezik a Malta Gaming Authoritytól (MGA) vagy Curacao eGamingtől. Ellenőrizzük a biztonsági intézkedéseket, kifizetési időket és ügyfélszolgálat minőségét. Biztonságod a prioritásunk.',
        'about_p3' => 'A fogadási feltételek megértése kulcsfontosságú. A 35x wagering azt jelenti, hogy 35-ször kell megforgatni a bónuszt. Látogasd meg a <a href="#bonus">bónusz szekciót</a> vagy nézd meg a <a href="#free">befizetés nélküli ajánlatokat</a>.'
    ],
    'faq' => [
        ['q'=>'Mi a legjobb kaszinó bónusz 2026-ban?','a'=>'A legjobb bónuszok 2026-ban €600-ig és 200 ingyenes pörgetésig terjednek. Casinia 100%-ot kínál €500-ig MGA licenccel, Spinanga 200%-ot €600-ig.'],
        ['q'=>'Hogyan használjam a promó kódot?','a'=>'Másold ki a kódot (pl. RABONA20 vagy CASINIA30) és illeszd be regisztráláskor vagy a pénztárnál. Egyes kódok automatikusan aktiválják a pörgetéseket.'],
        ['q'=>'Mit jelent a fogadási feltétel?','a'=>'A 35x feltétel azt jelenti, hogy a bónusz 35-szörösét kell megforgatni kifizetés előtt. €100 bónusznál 35x-szel €3.500 fogadás szükséges.'],
        ['q'=>'Biztonságosak ezek a kaszinók?','a'=>'Igen, mindegyik rendelkezik MGA vagy Curacao eGaming licenccel. SSL titkosítást használnak és felelős játék eszközöket kínálnak.'],
        ['q'=>'Milyen gyorsan vehetek ki pénzt?','a'=>'E-pénztárcák és kripto 24 órán belül. Banki átutalások 2-5 munkanap. Legtöbb kaszinónk gyors kifizetéseiről ismert.'],
        ['q'=>'Játszhatok mobilon?','a'=>'Természetesen! Minden kaszinó mobilra optimalizált. Játssz, fizess be és vedd ki a nyereményt közvetlenül a telefonodról.']
    ],
    'footer' => [
        'disclaimer_18' => '18+ Csak felnőtteknek. A szerencsejáték függőséget okozhat. Játssz felelősségteljesen.',
        'affiliate_disclosure' => 'Ez a weboldal affiliate linkeket tartalmaz. Jutalékot kaphatunk az Ön számára további költség nélkül.',
        'responsible_gambling' => 'Ha a szerencsejáték problémává válik, kérjen segítséget. Keresse a GamCare-t (www.gamcare.org.uk).'
    ],
    'highlights_map' => [
        'Live Casino'=>'Élő Kaszinó','Sports Betting'=>'Sportfogadás','Fast Payouts'=>'Gyors Kifizetések','Mobile App'=>'Mobil Alkalmazás',
        'Weekly Cashback'=>'Heti Cashback','Tournaments'=>'Versenyek','Fast Withdrawal'=>'Gyors Kifizetés','Sports & Casino'=>'Sport és Kaszinó',
        'Live Betting'=>'Élő Fogadás','Chicken Road Game'=>'Chicken Road Játék','Weekly Reload'=>'Heti Reload','Crypto Casino'=>'Kripto Kaszinó',
        'High Bonus'=>'Magas Bónusz','Poker Games'=>'Póker Játékok','5000+ Games'=>'5000+ Játék','No Deposit Bonus'=>'Befizetés Nélküli Bónusz',
        'Crypto Accepted'=>'Kripto Elfogadva','VIP Program'=>'VIP Program','No Deposit Spins'=>'Befizetés Nélküli Pörgetések','Slots Specialist'=>'Nyerőgép Specialista',
        'Mobile Optimized'=>'Mobilra Optimalizált','Daily Promotions'=>'Napi Akciók','Esports'=>'Esport','Crypto Payments'=>'Kripto Fizetés',
        'Seasonal Promotions'=>'Szezonális Akciók','Table Games'=>'Asztali Játékok','Slots'=>'Nyerőgépek','Online Casino'=>'Online Kaszinó'
    ]
];

// Norwegian
$translations['no'] = [
    'title' => 'Beste Casino Bonuser & Gratisspinn 2026',
    'description' => 'Sammenlign de beste online casino bonusene 2026. Gratisspinn uten innskudd, kampanjekoder og velkomstbonuser. Hent din bonus nå!',
    'keywords' => 'online kasino, casino bonus, gratisspinn, uten innskudd, kampanjekode, velkomstbonus, ekte penger, beste kasino, sportsbetting, kasino 2026',
    'h1' => 'Beste Casino Bonuser 2026',
    'subtitle' => 'Oppdag eksklusive bonuser opptil €600 og 200 gratisspinn. Tilbud uten innskudd tilgjengelig — begynn å vinne!',
    'trust' => ['🔒 Lisensierte kasinoer','⚡ Raske uttak garantert','📱 Mobilt kasino','🎁 Bonus uten innskudd','✅ Verifisert av eksperter'],
    'nav' => ['all'=>'🏠 Alle tilbud','reg'=>'🎁 Registreringsbonus','bonus'=>'💰 Bonuser','free'=>'🆓 Uten innskudd','slots'=>'🎰 Spilleautomater','jackpot'=>'💎 Jackpotter','live'=>'🃏 Live casino','sport'=>'⚽ Sport','tourn'=>'🏆 Turneringer'],
    'categories' => [
        'reg'=>['label'=>'🎁 Registrering','headline'=>'Registrer deg & Få Bonus','sub'=>'Rask registrering med umiddelbare belønninger'],
        'bonus'=>['label'=>'💰 Bonuser','headline'=>'Største Velkomstbonuser','sub'=>'Topp innskuddsbonuser og gratisspinn'],
        'free'=>['label'=>'🆓 Uten Innskudd','headline'=>'Null Risiko, Ekte Gevinster','sub'=>'Gratisspinn og bonuser uten innskudd'],
        'slots'=>['label'=>'🎰 Spilleautomater','headline'=>'Spinn & Vinn Umiddelbart','sub'=>'Topp spilleautomater med beste RTP'],
        'jackpot'=>['label'=>'💎 Jackpotter','headline'=>'Livsforandrende Jackpotter','sub'=>'Progressive jackpotter verdt millioner'],
        'live'=>['label'=>'🃏 Live Casino','headline'=>'Ekte Dealere, Ekte Gevinster','sub'=>'Live blackjack, rulett og baccarat'],
        'sport'=>['label'=>'⚽ Sport','headline'=>'Beste Odds, Størst Gevinster','sub'=>'Fotball, tennis og live betting'],
        'tourn'=>['label'=>'🏆 Turneringer','headline'=>'Konkurer om Store Premier','sub'=>'Kasino og sportturneringer'],
        'main'=>['label'=>'🏠 Generelt','headline'=>'Utforsk Topp Kasinoer','sub'=>'Hjemmeside, regler og informasjon']
    ],
    'cta' => 'Hent Nå',
    'seo_text' => [
        'about_h2' => 'Din guide til de beste casino bonusene 2026',
        'about_p1' => 'Velkommen til din ultimate destinasjon for å finne de beste online casino bonusene. Vi sammenligner hundrevis av tilbud fra lisensierte kasinoer for å bringe deg eksklusive velkomstbonuser, gratisspinn uten innskudd og kampanjekoder som faktisk fungerer.',
        'about_p2' => 'Hvert kasino har gyldig lisens fra Malta Gaming Authority (MGA) eller Curacao eGaming. Vi verifiserer sikkerhetstiltak, utbetalingstider og kundeservice. Din sikkerhet er vår prioritet.',
        'about_p3' => 'Å forstå omsetningskrav er viktig. 35x wagering betyr å satse 35 ganger bonusen. Besøk vår <a href="#bonus">bonusseksjon</a> eller utforsk <a href="#free">tilbud uten innskudd</a>.'
    ],
    'faq' => [
        ['q'=>'Hva er den beste casino bonusen 2026?','a'=>'De beste bonusene tilbyr opptil €600 med 200 gratisspinn. Casinia tilbyr 100% opptil €500 med MGA-lisens, Spinanga 200% opptil €600.'],
        ['q'=>'Hvordan bruker jeg en kampanjekode?','a'=>'Kopier koden (f.eks. RABONA20) og lim den inn ved registrering eller i kassen. Noen koder aktiverer gratisspinn automatisk.'],
        ['q'=>'Hva betyr omsetningskrav?','a'=>'35x omsetning betyr at du må satse 35 ganger bonusen før uttak. For €100 bonus med 35x trengs €3.500 i innsatser.'],
        ['q'=>'Er disse kasinoene trygge?','a'=>'Ja, alle har lisenser fra MGA eller Curacao eGaming. De bruker SSL-kryptering og tilbyr ansvarlig spill-verktøy.'],
        ['q'=>'Hvor raskt kan jeg ta ut gevinster?','a'=>'E-lommebøker og krypto behandles innen 24 timer. Bankoverføringer tar 2-5 virkedager.'],
        ['q'=>'Kan jeg spille på mobilen?','a'=>'Absolutt! Alle kasinoer er optimalisert for mobilspill. Spill, sett inn og ta ut direkte fra smarttelefonen.']
    ],
    'footer' => [
        'disclaimer_18' => '18+ Kun for voksne. Gambling kan være vanedannende. Spill ansvarlig.',
        'affiliate_disclosure' => 'Denne nettsiden inneholder tilknyttede lenker. Vi kan motta provisjon uten ekstra kostnad for deg.',
        'responsible_gambling' => 'Hvis gambling blir et problem, søk hjelp. Besøk Hjelpelinjen (www.telefonhjelp.no) eller GamCare (www.gamcare.org.uk).'
    ],
    'highlights_map' => [
        'Live Casino'=>'Live Casino','Sports Betting'=>'Sportsbetting','Fast Payouts'=>'Raske Uttak','Mobile App'=>'Mobil App',
        'Weekly Cashback'=>'Ukentlig Cashback','Tournaments'=>'Turneringer','Fast Withdrawal'=>'Raskt Uttak','Sports & Casino'=>'Sport & Casino',
        'Live Betting'=>'Live Betting','Chicken Road Game'=>'Chicken Road Spill','Weekly Reload'=>'Ukentlig Reload','Crypto Casino'=>'Krypto Casino',
        'High Bonus'=>'Høy Bonus','Poker Games'=>'Pokerspill','5000+ Games'=>'5000+ Spill','No Deposit Bonus'=>'Bonus Uten Innskudd',
        'Crypto Accepted'=>'Krypto Akseptert','VIP Program'=>'VIP-program','No Deposit Spins'=>'Spinn Uten Innskudd','Slots Specialist'=>'Slotspesialist',
        'Mobile Optimized'=>'Mobiloptimalisert','Daily Promotions'=>'Daglige Kampanjer','Esports'=>'Esport','Crypto Payments'=>'Krypto Betalinger',
        'Seasonal Promotions'=>'Sesongkampanjer','Table Games'=>'Bordspill','Slots'=>'Spilleautomater','Online Casino'=>'Online Casino'
    ]
];

// Finnish
$translations['fi'] = [
    'title' => 'Parhaat Kasinobonukset & Ilmaiskierrokset 2026',
    'description' => 'Vertaa parhaita nettikasinobonuksia 2026. Ilmaiskierroksia ilman talletusta, promokoodit ja tervetuliaisbonukset. Lunasta bonuksesi nyt!',
    'keywords' => 'nettikasino, kasinobonus, ilmaiskierrokset, ilman talletusta, promokoodi, tervetuliaisbonus, oikea raha, parhaat kasinot, vedonlyönti, kasino 2026',
    'h1' => 'Parhaat Kasinobonukset 2026',
    'subtitle' => 'Löydä eksklusiiviset bonukset jopa €600 ja 200 ilmaiskierrosta. Tarjouksia ilman talletusta — aloita voittaminen!',
    'trust' => ['🔒 Lisensoidut kasinot','⚡ Nopeat kotiutukset taattu','📱 Mobiili kasino','🎁 Bonus ilman talletusta','✅ Asiantuntijoiden tarkistama'],
    'nav' => ['all'=>'🏠 Kaikki tarjoukset','reg'=>'🎁 Rekisteröitymisbonus','bonus'=>'💰 Bonukset','free'=>'🆓 Ilman talletusta','slots'=>'🎰 Kolikkopelit','jackpot'=>'💎 Jätipotit','live'=>'🃏 Live-kasino','sport'=>'⚽ Urheilu','tourn'=>'🏆 Turnaukset'],
    'categories' => [
        'reg'=>['label'=>'🎁 Rekisteröidy','headline'=>'Rekisteröidy & Voita Heti','sub'=>'Nopea rekisteröinti välittömillä palkinnoilla'],
        'bonus'=>['label'=>'💰 Bonukset','headline'=>'Suurimmat Tervetuliaisbonukset','sub'=>'Parhaat talletusbonukset ja ilmaiskierrokset'],
        'free'=>['label'=>'🆓 Ilman Talletusta','headline'=>'Ei Riskiä, Aitoja Voittoja','sub'=>'Ilmaiskierroksia ja bonuksia ilman talletusta'],
        'slots'=>['label'=>'🎰 Kolikkopelit','headline'=>'Pyöritä & Voita Heti','sub'=>'Parhaat pelit korkeilla RTP-arvoilla'],
        'jackpot'=>['label'=>'💎 Jätipotit','headline'=>'Elämää Muuttavat Jätipotit','sub'=>'Progressiiviset jätipotit miljoonien arvosta'],
        'live'=>['label'=>'🃏 Live-Kasino','headline'=>'Oikeat Jakajat, Oikeat Voitot','sub'=>'Live blackjack, ruletti ja baccarat'],
        'sport'=>['label'=>'⚽ Urheilu','headline'=>'Parhaat Kertoimet, Suurimmat Voitot','sub'=>'Jalkapallo, tennis ja liveveto'],
        'tourn'=>['label'=>'🏆 Turnaukset','headline'=>'Kilpaile Suurista Palkinnoista','sub'=>'Kasino- ja urheiluturnaukset'],
        'main'=>['label'=>'🏠 Yleistä','headline'=>'Tutustu Parhaisiin Kasinoihin','sub'=>'Etusivu, säännöt ja tiedot']
    ],
    'cta' => 'Lunasta Nyt',
    'seo_text' => [
        'about_h2' => 'Oppaasi parhaisiin kasinobonuksiin 2026',
        'about_p1' => 'Tervetuloa parhaaseen paikkaan löytää nettikasinobonukset. Vertaamme satoja tarjouksia lisensoituilta kasinoilta tuodaksemme eksklusiiviset tervetuliaisbonukset, ilmaiskierrokset ilman talletusta ja toimivat promokoodit.',
        'about_p2' => 'Jokaisella kasinolla on voimassa oleva lisenssi Malta Gaming Authoritylta (MGA) tai Curacao eGamingilta. Tarkistamme turvatoimet, maksuajat ja asiakaspalvelun laadun. Turvallisuutesi on prioriteettimme.',
        'about_p3' => 'Kierrätysvaatimusten ymmärtäminen on avain. 35x kierrätys tarkoittaa bonuksen panostamista 35 kertaa. Käy <a href="#bonus">bonusosiossa</a> tai tutustu <a href="#free">ilman talletusta -tarjouksiin</a>.'
    ],
    'faq' => [
        ['q'=>'Mikä on paras kasinobonus 2026?','a'=>'Parhaat bonukset tarjoavat jopa €600 ja 200 ilmaiskierrosta. Casinia tarjoaa 100% €500 asti MGA-lisenssillä, Spinanga 200% €600 asti.'],
        ['q'=>'Miten käytän promokoodia?','a'=>'Kopioi koodi (esim. RABONA20) ja liitä se rekisteröityessäsi tai kassalla. Jotkut koodit aktivoivat ilmaiskierrokset automaattisesti.'],
        ['q'=>'Mitä kierrätysvaatimus tarkoittaa?','a'=>'35x kierrätys tarkoittaa bonuksen panostamista 35 kertaa ennen nostoa. €100 bonuksella 35x tarvitaan €3.500 panoksia.'],
        ['q'=>'Ovatko nämä kasinot turvallisia?','a'=>'Kyllä, kaikilla on MGA tai Curacao eGaming -lisenssi. Ne käyttävät SSL-salausta ja tarjoavat vastuullisen pelaamisen työkaluja.'],
        ['q'=>'Kuinka nopeasti voin nostaa voittoni?','a'=>'E-lompakot ja krypto käsitellään 24 tunnissa. Pankkisiirrot kestävät 2-5 arkipäivää.'],
        ['q'=>'Voinko pelata mobiililla?','a'=>'Ehdottomasti! Kaikki kasinot on optimoitu mobiilipelaamiseen. Pelaa, talleta ja nosta suoraan älypuhelimellasi.']
    ],
    'footer' => [
        'disclaimer_18' => '18+ Vain aikuisille. Uhkapelaaminen voi aiheuttaa riippuvuutta. Pelaa vastuullisesti.',
        'affiliate_disclosure' => 'Tämä sivusto sisältää kumppanilinkkejä. Voimme saada palkkion ilman lisäkustannuksia sinulle.',
        'responsible_gambling' => 'Jos pelaaminen muuttuu ongelmaksi, hae apua. Ota yhteyttä Peluuri-palveluun (www.peluuri.fi) tai GamCareen.'
    ],
    'highlights_map' => [
        'Live Casino'=>'Live-Kasino','Sports Betting'=>'Vedonlyönti','Fast Payouts'=>'Nopeat Maksut','Mobile App'=>'Mobiilisovellus',
        'Weekly Cashback'=>'Viikoittainen Cashback','Tournaments'=>'Turnaukset','Fast Withdrawal'=>'Nopea Nosto','Sports & Casino'=>'Urheilu & Kasino',
        'Live Betting'=>'Liveveto','Chicken Road Game'=>'Chicken Road Peli','Weekly Reload'=>'Viikoittainen Reload','Crypto Casino'=>'Krypto Kasino',
        'High Bonus'=>'Korkea Bonus','Poker Games'=>'Pokeripelit','5000+ Games'=>'5000+ Peliä','No Deposit Bonus'=>'Bonus Ilman Talletusta',
        'Crypto Accepted'=>'Krypto Hyväksytty','VIP Program'=>'VIP-ohjelma','No Deposit Spins'=>'Ilmaiskierrokset Ilman Talletusta','Slots Specialist'=>'Kolikkopelispesialisti',
        'Mobile Optimized'=>'Mobiilioptimoitu','Daily Promotions'=>'Päivittäiset Tarjoukset','Esports'=>'Esports','Crypto Payments'=>'Kryptomaksut',
        'Seasonal Promotions'=>'Kausiluonteiset Tarjoukset','Table Games'=>'Pöytäpelit','Slots'=>'Kolikkopelit','Online Casino'=>'Nettikasino'
    ]
];

// Czech
$translations['cs'] = [
    'title' => 'Nejlepší Casino Bonusy & Zatočení Zdarma 2026',
    'description' => 'Porovnejte nejlepší bonusy online kasin 2026. Zatočení zdarma bez vkladu, promo kódy a uvítací bonusy. Získejte svůj bonus!',
    'keywords' => 'online kasino, casino bonus, zatočení zdarma, bez vkladu, promo kód, uvítací bonus, skutečné peníze, nejlepší kasina, sázky, kasino 2026',
    'h1' => 'Nejlepší Casino Bonusy 2026',
    'subtitle' => 'Objevte exkluzivní bonusy až do €600 a 200 zatočení zdarma. Nabídky bez vkladu — začněte vyhrávat!',
    'trust' => ['🔒 Licencovaná kasina','⚡ Rychlé výplaty zaručeny','📱 Mobilní kasino','🎁 Bonus bez vkladu','✅ Ověřeno experty'],
    'nav' => ['all'=>'🏠 Všechny nabídky','reg'=>'🎁 Registrační bonus','bonus'=>'💰 Bonusy','free'=>'🆓 Bez vkladu','slots'=>'🎰 Automaty','jackpot'=>'💎 Jackpoty','live'=>'🃏 Live kasino','sport'=>'⚽ Sázky','tourn'=>'🏆 Turnaje'],
    'categories' => [
        'reg'=>['label'=>'🎁 Registrace','headline'=>'Registrujte se a Získejte','sub'=>'Rychlá registrace s okamžitými odměnami'],
        'bonus'=>['label'=>'💰 Bonusy','headline'=>'Největší Uvítací Bonusy','sub'=>'Nejlepší nabídky na vklad a free spiny'],
        'free'=>['label'=>'🆓 Bez Vkladu','headline'=>'Žádné Riziko, Skutečné Výhry','sub'=>'Zatočení zdarma a bonusy bez vkladu'],
        'slots'=>['label'=>'🎰 Automaty','headline'=>'Točte a Vyhrajte Hned','sub'=>'Nejlepší automaty s vysokým RTP'],
        'jackpot'=>['label'=>'💎 Jackpoty','headline'=>'Jackpoty Měnící Životy','sub'=>'Progresivní jackpoty za miliony'],
        'live'=>['label'=>'🃏 Live Kasino','headline'=>'Skuteční Krupiéři, Skutečné Výhry','sub'=>'Live blackjack, ruleta a baccarat'],
        'sport'=>['label'=>'⚽ Sázky','headline'=>'Nejlepší Kurzy, Největší Výhry','sub'=>'Fotbal, tenis a živé sázky'],
        'tourn'=>['label'=>'🏆 Turnaje','headline'=>'Soutěžte o Velké Ceny','sub'=>'Kasinové a sportovní turnaje'],
        'main'=>['label'=>'🏠 Obecné','headline'=>'Objevte Nejlepší Kasina','sub'=>'Hlavní stránka, pravidla a informace']
    ],
    'cta' => 'Získat Nyní',
    'seo_text' => [
        'about_h2' => 'Váš průvodce nejlepšími casino bonusy 2026',
        'about_p1' => 'Vítejte na nejlepší platformě pro vyhledávání bonusů online kasin. Porovnáváme stovky nabídek z licencovaných kasin a přinášíme exkluzivní uvítací bonusy, zatočení zdarma bez vkladu a funkční promo kódy.',
        'about_p2' => 'Každé kasino má platnou licenci od Malta Gaming Authority (MGA) nebo Curacao eGaming. Ověřujeme bezpečnostní opatření, doby výplat a kvalitu zákaznické podpory.',
        'about_p3' => 'Porozumění podmínkám protočení je klíčové. 35x wagering znamená vsadit 35krát bonus. Navštivte <a href="#bonus">sekci bonusů</a> nebo prozkoumejte <a href="#free">nabídky bez vkladu</a>.'
    ],
    'faq' => [
        ['q'=>'Jaký je nejlepší casino bonus 2026?','a'=>'Nejlepší bonusy nabízejí až €600 s 200 zatočeními zdarma. Casinia nabízí 100% do €500 s MGA licencí, Spinanga 200% do €600.'],
        ['q'=>'Jak použít promo kód?','a'=>'Zkopírujte kód (např. RABONA20) a vložte při registraci nebo v pokladně. Některé kódy aktivují zatočení automaticky.'],
        ['q'=>'Co znamená podmínka protočení?','a'=>'35x protočení znamená vsadit 35krát bonus před výběrem. Pro €100 bonus s 35x je potřeba €3.500 v sázkách.'],
        ['q'=>'Jsou tato kasina bezpečná?','a'=>'Ano, všechna mají licence MGA nebo Curacao eGaming. Používají SSL šifrování a nabízejí nástroje zodpovědného hraní.'],
        ['q'=>'Jak rychle mohu vybrat výhry?','a'=>'E-peněženky a krypto do 24 hodin. Bankovní převody 2-5 pracovních dnů.'],
        ['q'=>'Mohu hrát na mobilu?','a'=>'Samozřejmě! Všechna kasina jsou optimalizovaná pro mobilní hraní.']
    ],
    'footer' => [
        'disclaimer_18' => '18+ Pouze pro dospělé. Hazardní hry mohou být návykové. Hrajte zodpovědně.',
        'affiliate_disclosure' => 'Tento web obsahuje affiliate odkazy. Můžeme obdržet provizi bez dalších nákladů pro vás.',
        'responsible_gambling' => 'Pokud se gambling stane problémem, vyhledejte pomoc. Navštivte GamCare (www.gamcare.org.uk).'
    ],
    'highlights_map' => [
        'Live Casino'=>'Live Kasino','Sports Betting'=>'Sportovní Sázky','Fast Payouts'=>'Rychlé Výplaty','Mobile App'=>'Mobilní Aplikace',
        'Weekly Cashback'=>'Týdenní Cashback','Tournaments'=>'Turnaje','Fast Withdrawal'=>'Rychlý Výběr','Sports & Casino'=>'Sport & Kasino',
        'Live Betting'=>'Živé Sázky','Chicken Road Game'=>'Hra Chicken Road','Weekly Reload'=>'Týdenní Reload','Crypto Casino'=>'Krypto Kasino',
        'High Bonus'=>'Vysoký Bonus','Poker Games'=>'Pokerové Hry','5000+ Games'=>'5000+ Her','No Deposit Bonus'=>'Bonus Bez Vkladu',
        'Crypto Accepted'=>'Krypto Přijímáno','VIP Program'=>'VIP Program','No Deposit Spins'=>'Zatočení Bez Vkladu','Slots Specialist'=>'Specialista Automatů',
        'Mobile Optimized'=>'Mobilně Optimalizováno','Daily Promotions'=>'Denní Akce','Esports'=>'Esport','Crypto Payments'=>'Krypto Platby',
        'Seasonal Promotions'=>'Sezónní Akce','Table Games'=>'Stolní Hry','Slots'=>'Automaty','Online Casino'=>'Online Kasino'
    ]
];

// Dutch
$translations['nl'] = [
    'title' => 'Beste Casino Bonussen & Gratis Spins 2026',
    'description' => 'Vergelijk de beste online casino bonussen 2026. Gratis spins zonder storting, promotiecode en welkomstbonussen. Claim je bonus nu!',
    'keywords' => 'online casino, casino bonus, gratis spins, zonder storting, promotiecode, welkomstbonus, echt geld, beste casino, sportweddenschappen, casino 2026',
    'h1' => 'Beste Casino Bonussen 2026',
    'subtitle' => 'Ontdek exclusieve bonussen tot €600 en 200 gratis spins. Aanbiedingen zonder storting beschikbaar — begin met winnen!',
    'trust' => ['🔒 Gelicentieerde casino\'s','⚡ Snelle uitbetalingen gegarandeerd','📱 Mobiel casino beschikbaar','🎁 Bonus zonder storting','✅ Door experts geverifieerd'],
    'nav' => ['all'=>'🏠 Alle aanbiedingen','reg'=>'🎁 Registratiebonus','bonus'=>'💰 Bonussen','free'=>'🆓 Zonder storting','slots'=>'🎰 Gokkasten','jackpot'=>'💎 Jackpots','live'=>'🃏 Live casino','sport'=>'⚽ Sport','tourn'=>'🏆 Toernooien'],
    'categories' => [
        'reg'=>['label'=>'🎁 Registratie','headline'=>'Registreer & Win Direct','sub'=>'Snelle registratie met directe beloningen'],
        'bonus'=>['label'=>'💰 Bonussen','headline'=>'Grootste Welkomstbonussen','sub'=>'Top stortingsbonussen en gratis spins'],
        'free'=>['label'=>'🆓 Zonder Storting','headline'=>'Geen Risico, Echte Winsten','sub'=>'Gratis spins en bonussen zonder storting'],
        'slots'=>['label'=>'🎰 Gokkasten','headline'=>'Draai & Win Direct','sub'=>'Top gokkasten met beste RTP'],
        'jackpot'=>['label'=>'💎 Jackpots','headline'=>'Levensveranderende Jackpots','sub'=>'Progressieve jackpots van miljoenen'],
        'live'=>['label'=>'🃏 Live Casino','headline'=>'Echte Dealers, Echte Winsten','sub'=>'Live blackjack, roulette en baccarat'],
        'sport'=>['label'=>'⚽ Sport','headline'=>'Beste Odds, Grootste Winsten','sub'=>'Voetbal, tennis en live wedden'],
        'tourn'=>['label'=>'🏆 Toernooien','headline'=>'Strijdt om Grote Prijzen','sub'=>'Casino en sporttoernooien'],
        'main'=>['label'=>'🏠 Algemeen','headline'=>'Ontdek Top Casino\'s','sub'=>'Startpagina, regels en informatie']
    ],
    'cta' => 'Claim Nu',
    'seo_text' => [
        'about_h2' => 'Jouw gids voor de beste casino bonussen 2026',
        'about_p1' => 'Welkom bij jouw ultieme bestemming voor het vinden van de beste online casino bonussen. Wij vergelijken honderden aanbiedingen van gelicentieerde casino\'s om exclusieve welkomstbonussen, gratis spins zonder storting en werkende promotiecodes te bieden.',
        'about_p2' => 'Elk casino heeft een geldige licentie van de Malta Gaming Authority (MGA) of Curacao eGaming. We verifiëren beveiligingsmaatregelen, uitbetalingstijden en klantenservice.',
        'about_p3' => 'Inzetvereisten begrijpen is essentieel. 35x wagering betekent 35 keer de bonus inzetten. Bezoek onze <a href="#bonus">bonussectie</a> of bekijk <a href="#free">aanbiedingen zonder storting</a>.'
    ],
    'faq' => [
        ['q'=>'Wat is de beste casino bonus 2026?','a'=>'De beste bonussen bieden tot €600 met 200 gratis spins. Casinia biedt 100% tot €500 met MGA-licentie, Spinanga 200% tot €600.'],
        ['q'=>'Hoe gebruik ik een promotiecode?','a'=>'Kopieer de code (bijv. RABONA20) en plak deze bij registratie of in de kassa. Sommige codes activeren automatisch gratis spins.'],
        ['q'=>'Wat betekent inzetvereiste?','a'=>'35x inzetvereiste betekent de bonus 35 keer inzetten voor opname. Voor €100 bonus met 35x is €3.500 aan inzetten nodig.'],
        ['q'=>'Zijn deze casino\'s veilig?','a'=>'Ja, allemaal gelicentieerd door MGA of Curacao eGaming. Ze gebruiken SSL-encryptie en bieden verantwoord spelen tools.'],
        ['q'=>'Hoe snel kan ik opnemen?','a'=>'E-wallets en crypto binnen 24 uur. Bankoverschrijvingen 2-5 werkdagen.'],
        ['q'=>'Kan ik op mobiel spelen?','a'=>'Absoluut! Alle casino\'s zijn geoptimaliseerd voor mobiel. Speel, stort en neem op via je smartphone.']
    ],
    'footer' => [
        'disclaimer_18' => '18+ Alleen voor volwassenen. Gokken kan verslavend zijn. Speel verantwoord.',
        'affiliate_disclosure' => 'Deze website bevat affiliate links. We kunnen een commissie ontvangen zonder extra kosten voor jou.',
        'responsible_gambling' => 'Als gokken een probleem wordt, zoek hulp. Bezoek AGOG (www.agog.nl) of GamCare (www.gamcare.org.uk).'
    ],
    'highlights_map' => [
        'Live Casino'=>'Live Casino','Sports Betting'=>'Sportweddenschappen','Fast Payouts'=>'Snelle Uitbetalingen','Mobile App'=>'Mobiele App',
        'Weekly Cashback'=>'Wekelijkse Cashback','Tournaments'=>'Toernooien','Fast Withdrawal'=>'Snelle Opname','Sports & Casino'=>'Sport & Casino',
        'Live Betting'=>'Live Wedden','Chicken Road Game'=>'Chicken Road Spel','Weekly Reload'=>'Wekelijkse Reload','Crypto Casino'=>'Crypto Casino',
        'High Bonus'=>'Hoge Bonus','Poker Games'=>'Pokerspellen','5000+ Games'=>'5000+ Spellen','No Deposit Bonus'=>'Bonus Zonder Storting',
        'Crypto Accepted'=>'Crypto Geaccepteerd','VIP Program'=>'VIP Programma','No Deposit Spins'=>'Spins Zonder Storting','Slots Specialist'=>'Slots Specialist',
        'Mobile Optimized'=>'Mobiel Geoptimaliseerd','Daily Promotions'=>'Dagelijkse Acties','Esports'=>'Esports','Crypto Payments'=>'Crypto Betalingen',
        'Seasonal Promotions'=>'Seizoensacties','Table Games'=>'Tafelspellen','Slots'=>'Gokkasten','Online Casino'=>'Online Casino'
    ]
];

// Slovak
$translations['sk'] = [
    'title' => 'Najlepšie Casino Bonusy & Zatočenia Zadarmo 2026',
    'description' => 'Porovnajte najlepšie bonusy online kasín 2026. Zatočenia zadarmo bez vkladu, promo kódy a uvítacie bonusy. Získajte bonus!',
    'keywords' => 'online kasíno, casino bonus, zatočenia zadarmo, bez vkladu, promo kód, uvítací bonus, skutočné peniaze, kasíno 2026',
    'h1' => 'Najlepšie Casino Bonusy 2026',
    'subtitle' => 'Objavte exkluzívne bonusy až do €600 a 200 zatočení zadarmo. Ponuky bez vkladu — začnite vyhrávať!',
    'trust' => ['🔒 Licencované kasína','⚡ Rýchle výplaty zaručené','📱 Mobilné kasíno','🎁 Bonus bez vkladu','✅ Overené expertmi'],
    'nav' => ['all'=>'🏠 Všetky ponuky','reg'=>'🎁 Registračný bonus','bonus'=>'💰 Bonusy','free'=>'🆓 Bez vkladu','slots'=>'🎰 Automaty','jackpot'=>'💎 Jackpoty','live'=>'🃏 Live kasíno','sport'=>'⚽ Stávky','tourn'=>'🏆 Turnaje'],
    'categories' => [
        'reg'=>['label'=>'🎁 Registrácia','headline'=>'Zaregistrujte sa a Získajte','sub'=>'Rýchla registrácia s okamžitými odmenami'],
        'bonus'=>['label'=>'💰 Bonusy','headline'=>'Najväčšie Uvítacie Bonusy','sub'=>'Najlepšie ponuky vkladu a free spiny'],
        'free'=>['label'=>'🆓 Bez Vkladu','headline'=>'Žiadne Riziko, Skutočné Výhry','sub'=>'Zatočenia zadarmo a bonusy bez vkladu'],
        'slots'=>['label'=>'🎰 Automaty','headline'=>'Točte a Vyhrajte Hneď','sub'=>'Najlepšie automaty s vysokým RTP'],
        'jackpot'=>['label'=>'💎 Jackpoty','headline'=>'Jackpoty Meniace Životy','sub'=>'Progresívne jackpoty za milióny'],
        'live'=>['label'=>'🃏 Live Kasíno','headline'=>'Skutoční Krupiéri, Skutočné Výhry','sub'=>'Live blackjack, ruleta a baccarat'],
        'sport'=>['label'=>'⚽ Stávky','headline'=>'Najlepšie Kurzy, Najväčšie Výhry','sub'=>'Futbal, tenis a živé stávky'],
        'tourn'=>['label'=>'🏆 Turnaje','headline'=>'Súťažte o Veľké Ceny','sub'=>'Kasínové a športové turnaje'],
        'main'=>['label'=>'🏠 Všeobecné','headline'=>'Objavte Najlepšie Kasína','sub'=>'Hlavná stránka, pravidlá a informácie']
    ],
    'cta' => 'Získať Teraz',
    'seo_text' => [
        'about_h2' => 'Váš sprievodca najlepšími casino bonusmi 2026',
        'about_p1' => 'Vitajte na najlepšej platforme pre vyhľadávanie bonusov online kasín. Porovnávame stovky ponúk z licencovaných kasín a prinášame exkluzívne uvítacie bonusy a promo kódy.',
        'about_p2' => 'Každé kasíno má platnú licenciu od Malta Gaming Authority (MGA) alebo Curacao eGaming. Overujeme bezpečnostné opatrenia a doby výplat.',
        'about_p3' => 'Pochopenie podmienok pretočenia je kľúčové. 35x wagering znamená staviť 35-krát bonus. Navštívte <a href="#bonus">sekciu bonusov</a> alebo preskúmajte <a href="#free">ponuky bez vkladu</a>.'
    ],
    'faq' => [
        ['q'=>'Aký je najlepší casino bonus 2026?','a'=>'Najlepšie bonusy ponúkajú až €600 s 200 zatočeniami zadarmo. Casinia ponúka 100% do €500 s MGA licenciou.'],
        ['q'=>'Ako použiť promo kód?','a'=>'Skopírujte kód (napr. RABONA20) a vložte pri registrácii alebo v pokladni.'],
        ['q'=>'Čo znamená podmienka pretočenia?','a'=>'35x pretočenie znamená staviť 35-krát bonus pred výberom.'],
        ['q'=>'Sú tieto kasína bezpečné?','a'=>'Áno, všetky majú licencie MGA alebo Curacao eGaming s SSL šifrovaním.'],
        ['q'=>'Ako rýchlo môžem vybrať výhry?','a'=>'E-peňaženky do 24 hodín, bankové prevody 2-5 pracovných dní.'],
        ['q'=>'Môžem hrať na mobile?','a'=>'Samozrejme! Všetky kasína sú optimalizované pre mobilné hranie.']
    ],
    'footer' => [
        'disclaimer_18' => '18+ Len pre dospelých. Hazardné hry môžu byť návykové. Hrajte zodpovedne.',
        'affiliate_disclosure' => 'Tento web obsahuje affiliate odkazy. Môžeme získať províziu bez nákladov pre vás.',
        'responsible_gambling' => 'Ak sa gambling stane problémom, vyhľadajte pomoc. GamCare (www.gamcare.org.uk).'
    ],
    'highlights_map' => [
        'Live Casino'=>'Live Kasíno','Sports Betting'=>'Športové Stávky','Fast Payouts'=>'Rýchle Výplaty','Mobile App'=>'Mobilná Aplikácia',
        'Weekly Cashback'=>'Týždenný Cashback','Tournaments'=>'Turnaje','Fast Withdrawal'=>'Rýchly Výber','Sports & Casino'=>'Šport & Kasíno',
        'Live Betting'=>'Živé Stávky','Chicken Road Game'=>'Hra Chicken Road','Weekly Reload'=>'Týždenný Reload','Crypto Casino'=>'Krypto Kasíno',
        'High Bonus'=>'Vysoký Bonus','Poker Games'=>'Pokerové Hry','5000+ Games'=>'5000+ Hier','No Deposit Bonus'=>'Bonus Bez Vkladu',
        'Crypto Accepted'=>'Krypto Akceptované','VIP Program'=>'VIP Program','No Deposit Spins'=>'Zatočenia Bez Vkladu','Slots Specialist'=>'Špecialista Automatov',
        'Mobile Optimized'=>'Mobilne Optimalizované','Daily Promotions'=>'Denné Akcie','Esports'=>'Esport','Crypto Payments'=>'Krypto Platby',
        'Seasonal Promotions'=>'Sezónne Akcie','Table Games'=>'Stolné Hry','Slots'=>'Automaty','Online Casino'=>'Online Kasíno'
    ]
];

// Slovenian
$translations['sl'] = [
    'title' => 'Najboljši Casino Bonusi & Brezplačni Vrtljaji 2026',
    'description' => 'Primerjajte najboljše bonuse spletnih igralnic 2026. Brezplačni vrtljaji brez depozita, promo kode in dobrodošlični bonusi!',
    'keywords' => 'spletna igralnica, casino bonus, brezplačni vrtljaji, brez depozita, promo koda, dobrodošlica bonus, pravi denar, najboljše igralnice, 2026',
    'h1' => 'Najboljši Casino Bonusi 2026',
    'subtitle' => 'Odkrijte ekskluzivne bonuse do €600 in 200 brezplačnih vrtljajev. Ponudbe brez depozita — začnite zmagovati!',
    'trust' => ['🔒 Licencirane igralnice','⚡ Hitri dvigi zagotovljeni','📱 Mobilna igralnica','🎁 Bonus brez depozita','✅ Preverjeno s strani strokovnjakov'],
    'nav' => ['all'=>'🏠 Vse ponudbe','reg'=>'🎁 Registracijski bonus','bonus'=>'💰 Bonusi','free'=>'🆓 Brez depozita','slots'=>'🎰 Igralni avtomati','jackpot'=>'💎 Jackpoti','live'=>'🃏 Live igralnica','sport'=>'⚽ Šport','tourn'=>'🏆 Turnirji'],
    'categories' => [
        'reg'=>['label'=>'🎁 Registracija','headline'=>'Registrirajte se in Pridobite','sub'=>'Hitra registracija s takojšnjimi nagradami'],
        'bonus'=>['label'=>'💰 Bonusi','headline'=>'Največji Dobrodošlični Bonusi','sub'=>'Najboljše ponudbe depozita in vrtljajev'],
        'free'=>['label'=>'🆓 Brez Depozita','headline'=>'Brez Tveganja, Pravi Dobički','sub'=>'Brezplačni vrtljaji brez depozita'],
        'slots'=>['label'=>'🎰 Avtomati','headline'=>'Zavrtite in Zmagajte Takoj','sub'=>'Najboljši avtomati z visokim RTP'],
        'jackpot'=>['label'=>'💎 Jackpoti','headline'=>'Jackpoti ki Spreminjajo Življenja','sub'=>'Progresivni jackpoti vredni milijone'],
        'live'=>['label'=>'🃏 Live Igralnica','headline'=>'Pravi Delivci, Pravi Dobički','sub'=>'Live blackjack, ruleta in baccarat'],
        'sport'=>['label'=>'⚽ Šport','headline'=>'Najboljše Kvote, Največji Dobički','sub'=>'Nogomet, tenis in stave v živo'],
        'tourn'=>['label'=>'🏆 Turnirji','headline'=>'Tekmujte za Velike Nagrade','sub'=>'Igralniški in športni turnirji'],
        'main'=>['label'=>'🏠 Splošno','headline'=>'Raziščite Najboljše Igralnice','sub'=>'Domača stran, pravila in informacije']
    ],
    'cta' => 'Pridobi Zdaj',
    'seo_text' => [
        'about_h2' => 'Vaš vodnik po najboljših casino bonusih 2026',
        'about_p1' => 'Dobrodošli na najboljši platformi za iskanje bonusov spletnih igralnic. Primerjamo stotine ponudb iz licenciranih igralnic in prinašamo ekskluzivne dobrodošlične bonuse in promo kode.',
        'about_p2' => 'Vsaka igralnica ima veljavno licenco od Malta Gaming Authority (MGA) ali Curacao eGaming. Preverjamo varnostne ukrepe in čase izplačil.',
        'about_p3' => 'Razumevanje pogojev vrtenja je ključno. 35x wagering pomeni staviti 35-krat bonus. Obiščite <a href="#bonus">oddelek bonusov</a> ali raziščite <a href="#free">ponudbe brez depozita</a>.'
    ],
    'faq' => [
        ['q'=>'Kateri je najboljši casino bonus 2026?','a'=>'Najboljši bonusi ponujajo do €600 z 200 brezplačnimi vrtljaji. Casinia ponuja 100% do €500 z MGA licenco.'],
        ['q'=>'Kako uporabim promo kodo?','a'=>'Kopirajte kodo (npr. RABONA20) in jo prilepite ob registraciji ali na blagajni.'],
        ['q'=>'Kaj pomeni pogoj vrtenja?','a'=>'35x vrtenje pomeni staviti 35-krat bonus pred dvigom.'],
        ['q'=>'Ali so te igralnice varne?','a'=>'Da, vse imajo licence MGA ali Curacao eGaming s SSL šifriranjem.'],
        ['q'=>'Kako hitro lahko dvignem dobitke?','a'=>'E-denarnice do 24 ur, bančna nakazila 2-5 delovnih dni.'],
        ['q'=>'Ali lahko igram na mobilnem?','a'=>'Seveda! Vse igralnice so optimizirane za mobilno igro.']
    ],
    'footer' => [
        'disclaimer_18' => '18+ Samo za odrasle. Igre na srečo lahko povzročijo odvisnost. Igrajte odgovorno.',
        'affiliate_disclosure' => 'Ta spletna stran vsebuje partnerske povezave. Lahko prejmemo provizijo brez dodatnih stroškov za vas.',
        'responsible_gambling' => 'Če igranje postane problem, poiščite pomoč. GamCare (www.gamcare.org.uk).'
    ],
    'highlights_map' => [
        'Live Casino'=>'Live Igralnica','Sports Betting'=>'Športne Stave','Fast Payouts'=>'Hitri Dvigi','Mobile App'=>'Mobilna Aplikacija',
        'Weekly Cashback'=>'Tedenski Cashback','Tournaments'=>'Turnirji','Fast Withdrawal'=>'Hiter Dvig','Sports & Casino'=>'Šport & Igralnica',
        'Live Betting'=>'Stave v Živo','Chicken Road Game'=>'Igra Chicken Road','Weekly Reload'=>'Tedenski Reload','Crypto Casino'=>'Kripto Igralnica',
        'High Bonus'=>'Visok Bonus','Poker Games'=>'Poker Igre','5000+ Games'=>'5000+ Iger','No Deposit Bonus'=>'Bonus Brez Depozita',
        'Crypto Accepted'=>'Kripto Sprejet','VIP Program'=>'VIP Program','No Deposit Spins'=>'Vrtljaji Brez Depozita','Slots Specialist'=>'Specialist Avtomatov',
        'Mobile Optimized'=>'Mobilno Optimizirano','Daily Promotions'=>'Dnevne Akcije','Esports'=>'Ešport','Crypto Payments'=>'Kripto Plačila',
        'Seasonal Promotions'=>'Sezonske Akcije','Table Games'=>'Namizne Igre','Slots'=>'Igralni Avtomati','Online Casino'=>'Spletna Igralnica'
    ]
];

// Turkish
$translations['tr'] = [
    'title' => 'En İyi Casino Bonusları & Bedava Dönüşler 2026',
    'description' => 'En iyi online casino bonuslarını karşılaştırın 2026. Yatırımsız bedava dönüşler, promosyon kodları ve hoş geldin bonusları!',
    'keywords' => 'online casino, casino bonus, bedava dönüşler, yatırımsız, promosyon kodu, hoş geldin bonusu, gerçek para, en iyi casino, bahis, casino 2026',
    'h1' => 'En İyi Casino Bonusları 2026',
    'subtitle' => '€600\'ya kadar özel bonuslar ve 200 bedava dönüş keşfedin. Yatırımsız teklifler mevcut — kazanmaya başlayın!',
    'trust' => ['🔒 Lisanslı casinolar','⚡ Hızlı çekimler garantili','📱 Mobil casino','🎁 Yatırımsız bonus','✅ Uzmanlar tarafından doğrulandı'],
    'nav' => ['all'=>'🏠 Tüm teklifler','reg'=>'🎁 Kayıt bonusu','bonus'=>'💰 Bonuslar','free'=>'🆓 Yatırımsız','slots'=>'🎰 Slotlar','jackpot'=>'💎 Jackpotlar','live'=>'🃏 Canlı casino','sport'=>'⚽ Spor','tourn'=>'🏆 Turnuvalar'],
    'categories' => [
        'reg'=>['label'=>'🎁 Kayıt','headline'=>'Kayıt Ol ve Kazan','sub'=>'Hızlı kayıt ile anında ödüller'],
        'bonus'=>['label'=>'💰 Bonuslar','headline'=>'En Büyük Hoş Geldin Bonusları','sub'=>'En iyi yatırım bonusları ve bedava dönüşler'],
        'free'=>['label'=>'🆓 Yatırımsız','headline'=>'Sıfır Risk, Gerçek Ödüller','sub'=>'Yatırımsız bedava dönüşler ve bonuslar'],
        'slots'=>['label'=>'🎰 Slotlar','headline'=>'Döndür ve Anında Kazan','sub'=>'Yüksek RTP\'li en iyi slotlar'],
        'jackpot'=>['label'=>'💎 Jackpotlar','headline'=>'Hayat Değiştiren Jackpotlar','sub'=>'Milyonluk progresif jackpotlar'],
        'live'=>['label'=>'🃏 Canlı Casino','headline'=>'Gerçek Krupiyeler, Gerçek Kazançlar','sub'=>'Canlı blackjack, rulet ve bakara'],
        'sport'=>['label'=>'⚽ Spor','headline'=>'En İyi Oranlar, En Büyük Kazançlar','sub'=>'Futbol, tenis ve canlı bahis'],
        'tourn'=>['label'=>'🏆 Turnuvalar','headline'=>'Büyük Ödüller İçin Yarış','sub'=>'Casino ve spor turnuvaları'],
        'main'=>['label'=>'🏠 Genel','headline'=>'En İyi Casinoları Keşfet','sub'=>'Ana sayfa, kurallar ve bilgiler']
    ],
    'cta' => 'Hemen Al',
    'seo_text' => [
        'about_h2' => 'En iyi casino bonusları rehberiniz 2026',
        'about_p1' => 'En iyi online casino bonuslarını bulmak için nihai hedefinize hoş geldiniz. Lisanslı casinolardan yüzlerce teklifi karşılaştırıyoruz.',
        'about_p2' => 'Her casino Malta Gaming Authority (MGA) veya Curacao eGaming\'den geçerli lisansa sahiptir. Güvenlik önlemlerini ve ödeme sürelerini doğruluyoruz.',
        'about_p3' => 'Çevrim şartlarını anlamak önemlidir. 35x wagering bonusu 35 kez yatırmanız gerektiği anlamına gelir. <a href="#bonus">Bonus bölümümüzü</a> veya <a href="#free">yatırımsız teklifleri</a> inceleyin.'
    ],
    'faq' => [
        ['q'=>'2026\'nın en iyi casino bonusu hangisi?','a'=>'En iyi bonuslar €600\'ya kadar 200 bedava dönüşle sunuluyor. Casinia MGA lisansıyla 100% €500\'a kadar teklif ediyor.'],
        ['q'=>'Promosyon kodu nasıl kullanılır?','a'=>'Kodu kopyalayın (örn. RABONA20) ve kayıt veya kasa bölümünde yapıştırın.'],
        ['q'=>'Çevrim şartı ne demek?','a'=>'35x çevrim, çekim öncesi bonusu 35 kez yatırmanız gerektiği anlamına gelir.'],
        ['q'=>'Bu casinolar güvenli mi?','a'=>'Evet, hepsi MGA veya Curacao eGaming lisanslıdır ve SSL şifreleme kullanır.'],
        ['q'=>'Kazançlarımı ne kadar hızlı çekebilirim?','a'=>'E-cüzdanlar ve kripto 24 saat içinde. Banka transferleri 2-5 iş günü.'],
        ['q'=>'Mobilde oynayabilir miyim?','a'=>'Kesinlikle! Tüm casinolar mobil için optimize edilmiştir.']
    ],
    'footer' => [
        'disclaimer_18' => '18+ Sadece yetişkinler için. Kumar bağımlılık yapabilir. Sorumlu oynayın.',
        'affiliate_disclosure' => 'Bu site ortaklık bağlantıları içerir. Size ek maliyet olmadan komisyon alabiliriz.',
        'responsible_gambling' => 'Kumar sorun olursa yardım arayın. GamCare (www.gamcare.org.uk).'
    ],
    'highlights_map' => [
        'Live Casino'=>'Canlı Casino','Sports Betting'=>'Spor Bahisleri','Fast Payouts'=>'Hızlı Ödemeler','Mobile App'=>'Mobil Uygulama',
        'Weekly Cashback'=>'Haftalık Cashback','Tournaments'=>'Turnuvalar','Fast Withdrawal'=>'Hızlı Çekim','Sports & Casino'=>'Spor & Casino',
        'Live Betting'=>'Canlı Bahis','Chicken Road Game'=>'Chicken Road Oyunu','Weekly Reload'=>'Haftalık Reload','Crypto Casino'=>'Kripto Casino',
        'High Bonus'=>'Yüksek Bonus','Poker Games'=>'Poker Oyunları','5000+ Games'=>'5000+ Oyun','No Deposit Bonus'=>'Yatırımsız Bonus',
        'Crypto Accepted'=>'Kripto Kabul Edilir','VIP Program'=>'VIP Programı','No Deposit Spins'=>'Yatırımsız Dönüşler','Slots Specialist'=>'Slot Uzmanı',
        'Mobile Optimized'=>'Mobil Optimize','Daily Promotions'=>'Günlük Promosyonlar','Esports'=>'Espor','Crypto Payments'=>'Kripto Ödemeler',
        'Seasonal Promotions'=>'Sezon Promosyonları','Table Games'=>'Masa Oyunları','Slots'=>'Slotlar','Online Casino'=>'Online Casino'
    ]
];

// ─── CATEGORY DETECTION ─────────────────────────────────────────────────────
function detectCategory($item) {
    $name = strtolower($item['Name'] ?? '');
    $url = strtolower($item['URL'] ?? '');
    $combined = $name . ' ' . $url;

    // Slots
    if (preg_match('/\b(slot|chicken.?road|aviator|plinko|mines|penalty|pirots|sweet.?bonanza|gates.?of.?olympus|keno|book.?of.?adventure)\b/', $combined)) {
        return 'slots';
    }
    // Jackpot
    if (preg_match('/\b(jackpot|wonderpot|progressive.?jackpot)\b/', $combined)) {
        return 'jackpot';
    }
    // Live
    if (preg_match('/\b(live.?casino|live.?betting|live.?dealer)\b/', $combined)) {
        return 'live';
    }
    // Registration
    if (preg_match('/\b(registration|fast.?registration|signup|quick.?registration|short.?registration)\b/', $combined)) {
        return 'reg';
    }
    // Tournaments
    if (preg_match('/\b(tournament|euro2024|champions|wimbledon|seasons|halloween|christmas|easter)\b/', $combined)) {
        return 'tourn';
    }
    // Free / No deposit
    if (preg_match('/\b(no.?deposit|free.?spin|freespin)\b/', $combined)) {
        return 'free';
    }
    // Sport
    if (($item['Product'] ?? '') === 'Sport' || preg_match('/\b(sport|sportids|football|tennis|table.?tennis|match.?banner|betting|cricket|odds|e.?sport|cashback.?500)\b/', $combined)) {
        return 'sport';
    }
    // Bonus
    if (preg_match('/\b(bonus|promo|welcome|reload|cashback|weekend.?reload|offer|dubai.?promo)\b/', $combined)) {
        return 'bonus';
    }
    // Default
    return 'main';
}

// ─── CARD HEADLINE GENERATION ────────────────────────────────────────────────
function generateCardHeadline($item, $category, $lang) {
    $brand = $item['Brand'] ?? 'Casino';
    $bonus = $item['BonusAmount'] ?? 0;
    $spins = $item['FreeSpins'] ?? 0;
    $nds = $item['NoDepositSpins'] ?? 0;

    $headlines = [
        'en' => [
            'slots' => ["Spin {$brand} slots for massive wins","Play & win big on {$brand}","Try your luck on {$brand} games","Hit the jackpot on {$brand} slots"],
            'jackpot' => ["One spin could change everything at {$brand}","{$brand} jackpot worth millions awaits","Chase millions with {$brand} jackpots"],
            'live' => ["Real dealers, real action at {$brand}","Join live tables at {$brand} now","Experience {$brand} live casino thrills"],
            'reg' => ["Join {$brand} in 60 seconds, get €{$bonus}","Register at {$brand} & claim your bonus","Quick signup at {$brand} — bonus waiting"],
            'free' => ["{$nds} free spins, zero risk at {$brand}","No deposit needed — play {$brand} free","Free spins waiting at {$brand}"],
            'sport' => ["Bet on top matches at {$brand}","Best odds & live betting at {$brand}","{$brand} sports — bet & win big"],
            'tourn' => ["Compete in {$brand} tournaments now","Win big prizes in {$brand} events","Join the action at {$brand} tournaments"],
            'bonus' => ["Get up to €{$bonus} + {$spins} spins at {$brand}","{$brand} welcome bonus — claim €{$bonus}","Huge bonus waiting at {$brand}"],
            'main' => ["Discover everything at {$brand}","Explore {$brand} — games & bonuses","Start your journey at {$brand}"]
        ],
        'de' => [
            'slots' => ["Spiele {$brand} Slots für große Gewinne","Drehe & gewinne groß bei {$brand}","Teste dein Glück bei {$brand}","Jackpot-Chance bei {$brand} Slots"],
            'jackpot' => ["Ein Dreh bei {$brand} kann alles ändern","{$brand} Jackpot wartet auf dich","Millionen bei {$brand} gewinnen"],
            'live' => ["Echte Dealer bei {$brand} erleben","{$brand} Live Casino — jetzt spielen","Live-Action bei {$brand}"],
            'reg' => ["Bei {$brand} anmelden & €{$bonus} sichern","Registriere dich bei {$brand} in 60s","Schnelle Anmeldung bei {$brand}"],
            'free' => ["{$nds} Freispiele ohne Einzahlung bei {$brand}","Kein Risiko — {$brand} gratis testen","Freispiele warten bei {$brand}"],
            'sport' => ["Wette auf Top-Spiele bei {$brand}","Beste Quoten bei {$brand} Sportwetten","{$brand} Sport — wette & gewinne"],
            'tourn' => ["Nimm an {$brand} Turnieren teil","Große Preise bei {$brand}","Action bei {$brand} Turnieren"],
            'bonus' => ["Bis zu €{$bonus} + {$spins} Spins bei {$brand}","{$brand} Willkommensbonus — €{$bonus} sichern","Riesiger Bonus bei {$brand}"],
            'main' => ["Entdecke alles bei {$brand}","Erkunde {$brand} — Spiele & Boni","Starte bei {$brand} durch"]
        ],
        'fr' => [
            'slots' => ["Jouez aux slots {$brand} pour gagner gros","Tournez & gagnez gros chez {$brand}","Tentez votre chance chez {$brand}"],
            'jackpot' => ["Un tour chez {$brand} peut tout changer","Jackpot {$brand} de millions vous attend"],
            'live' => ["Vrais croupiers chez {$brand}","Casino live {$brand} — jouez maintenant"],
            'reg' => ["Inscrivez-vous chez {$brand} — €{$bonus} offerts","Inscription rapide chez {$brand}"],
            'free' => ["{$nds} tours gratuits chez {$brand}","Sans dépôt — jouez chez {$brand}"],
            'sport' => ["Pariez chez {$brand} aux meilleures cotes","Paris sportifs {$brand} — gagnez gros"],
            'tourn' => ["Participez aux tournois {$brand}","Gagnez des prix chez {$brand}"],
            'bonus' => ["Jusqu'à €{$bonus} + {$spins} tours chez {$brand}","Bonus bienvenue {$brand} — €{$bonus}"],
            'main' => ["Découvrez {$brand} — jeux & bonus","Explorez tout chez {$brand}"]
        ],
        'it' => [
            'slots' => ["Gioca alle slot {$brand} e vinci","Prova {$brand} per grandi vincite","Slot {$brand} — gira e vinci"],
            'jackpot' => ["Un giro su {$brand} può cambiare tutto","Jackpot milionario su {$brand}"],
            'live' => ["Dealer veri al casinò {$brand}","Live casino {$brand} — gioca ora"],
            'reg' => ["Registrati su {$brand} e ricevi €{$bonus}","Iscrizione veloce su {$brand}"],
            'free' => ["{$nds} giri gratis su {$brand}","Senza deposito — gioca su {$brand}"],
            'sport' => ["Scommetti su {$brand} con le migliori quote","Scommesse {$brand} — vinci alla grande"],
            'tourn' => ["Partecipa ai tornei {$brand}","Grandi premi nei tornei {$brand}"],
            'bonus' => ["Fino a €{$bonus} + {$spins} giri su {$brand}","Bonus benvenuto {$brand} — €{$bonus}"],
            'main' => ["Scopri tutto su {$brand}","Esplora {$brand} — giochi e bonus"]
        ],
    ];

    // Get the headline array for the language and category, fallback to en
    $langHeadlines = $headlines[$lang] ?? $headlines['en'];
    $catHeadlines = $langHeadlines[$category] ?? $langHeadlines['main'] ?? ["Discover {$brand}"];

    // Use item ID to deterministically pick a headline variant
    $idx = ($item['Id'] ?? 0) % count($catHeadlines);
    return $catHeadlines[$idx];
}

// ─── LANGUAGES TO PROCESS ────────────────────────────────────────────────────
$langOrder = ['en','de','fr','it','el','pl','es','ar','pt','hu','no','fi','cs','nl','sk','sl','tr'];

// Minimum count threshold
$minCount = 3;

// Languages to skip that have fewer than 3 entries (from analysis)
$skipLangs = ['eu','ch','hr','hi','th','ja'];

// Group affiliates by language
$byLang = [];
foreach ($raw as $item) {
    $lang = $item['Language'] ?? '';
    if ($lang === '' || $lang === 'All languages' || in_array($lang, $skipLangs)) {
        continue;
    }
    $byLang[$lang][] = $item;
}

// ─── GENERATE FILES ──────────────────────────────────────────────────────────
$generated = 0;
foreach ($langOrder as $lang) {
    if (!isset($byLang[$lang]) || count($byLang[$lang]) < $minCount) {
        echo "SKIP: {$lang} — " . (count($byLang[$lang] ?? [])) . " entries (min {$minCount})\n";
        continue;
    }
    if (!isset($translations[$lang])) {
        echo "SKIP: {$lang} — no translations defined\n";
        continue;
    }

    $t = $translations[$lang];
    $items = $byLang[$lang];

    // Build affiliates array
    $affiliates = [];
    foreach ($items as $item) {
        $cat = detectCategory($item);
        $highlights = [];
        foreach (($item['Highlights'] ?? []) as $h) {
            $highlights[] = $t['highlights_map'][$h] ?? $h;
        }

        $affiliates[] = [
            'id' => $item['Id'],
            'name' => $item['Name'],
            'brand' => $item['Brand'],
            'url' => $item['URL'],
            'category' => $cat,
            'product' => $item['Product'],
            'bonus' => str_replace('â¬', '€', $item['Bonus']),
            'bonus_amount' => $item['BonusAmount'],
            'free_spins' => $item['FreeSpins'],
            'no_deposit_spins' => 0,
            'no_deposit_code' => '',
            'promo_code' => '',
            'min_deposit' => $item['MinDeposit'],
            'wagering' => $item['Wagering'],
            'rating' => $item['Rating'],
            'license' => $item['License'],
            'highlights' => $highlights,
            'cta_text' => $t['cta'],
            'card_headline' => generateCardHeadline($item, $cat, $lang)
        ];
    }

    // Deduplicate by brand+category — keep entry with highest bonus_amount per combo
    $bestByKey = [];
    foreach ($affiliates as $a) {
        $key = $a['brand'] . '|' . $a['category'];
        if (!isset($bestByKey[$key]) || $a['bonus_amount'] > $bestByKey[$key]['bonus_amount']) {
            $bestByKey[$key] = $a;
        }
    }
    $affiliates = array_values($bestByKey);

    // Sort: highest rating first, then by bonus amount
    usort($affiliates, function($a, $b) {
        if ($b['rating'] !== $a['rating']) return $b['rating'] <=> $a['rating'];
        return $b['bonus_amount'] <=> $a['bonus_amount'];
    });

    $output = [
        'meta' => [
            'lang' => $lang,
            'title' => $t['title'],
            'description' => $t['description'],
            'keywords' => $t['keywords'],
            'h1' => $t['h1'],
            'subtitle' => $t['subtitle'],
            'updated' => '2026-04-02'
        ],
        'trust' => $t['trust'],
        'nav' => $t['nav'],
        'categories' => $t['categories'],
        'affiliates' => $affiliates,
        'seo_text' => $t['seo_text'],
        'faq' => $t['faq'],
        'footer' => $t['footer'],
        'blogs' => []
    ];

    // Add RTL direction for Arabic
    if ($lang === 'ar') {
        $output['meta']['dir'] = 'rtl';
    }

    $json = json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    $filePath = $outputDir . '/' . $lang . '.json';
    file_put_contents($filePath, $json);

    $count = count($affiliates);
    echo "OK: {$filePath} — {$count} affiliates\n";
    $generated++;
}

echo "\nDone! Generated {$generated} language files in {$outputDir}/\n";
