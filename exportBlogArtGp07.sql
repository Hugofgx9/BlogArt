-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  Dim 29 mars 2020 à 20:17
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `BLOGART20`
--

-- --------------------------------------------------------

--
-- Structure de la table `ANGLE`
--

CREATE TABLE `ANGLE` (
  `NumAngl` char(8) NOT NULL,
  `LibAngl` char(60) DEFAULT NULL,
  `NumLang` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ANGLE`
--

INSERT INTO `ANGLE` (`NumAngl`, `LibAngl`, `NumLang`) VALUES
('ANGL0101', 'Handicap', 'FRAN01'),
('ANGL0102', 'Handicap', 'ANGL01'),
('ANGL0103', 'Handikap', 'ALLE01'),
('ANGL0201', 'Grandes figures littéraires', 'FRAN01'),
('ANGL0202', 'Great literary figures', 'ANGL01'),
('ANGL0203', 'Große literarische Persönlichkeiten', 'ALLE01'),
('ANGL0301', 'Happy hours', 'FRAN01'),
('ANGL0302', 'Happy hours', 'ANGL01'),
('ANGL0303', 'Happy hours', 'ALLE01'),
('ANGL0401', 'Histoire médiévale', 'FRAN01'),
('ANGL0402', 'Medieval History', 'ANGL01'),
('ANGL0403', 'Mittelalterliche Geschichte', 'ALLE01'),
('ANGL0501', 'Intelligence collective', 'FRAN01'),
('ANGL0502', 'Collective Intelligence', 'ANGL01'),
('ANGL0503', 'Gemeinsame Intelligenz', 'ALLE01'),
('ANGL0601', 'Expérience 3.0', 'FRAN01'),
('ANGL0602', 'Experience 3.0', 'ANGL01'),
('ANGL0603', 'Erfahrung 3.0', 'ALLE01'),
('ANGL0701', 'Chatbot et IA', 'FRAN01'),
('ANGL0702', 'Chatbot and IA', 'ANGL01'),
('ANGL0703', 'Chatbot und KI', 'ALLE01'),
('ANGL0801', 'Stories', 'FRAN01'),
('ANGL0802', 'Stories', 'ANGL01'),
('ANGL0803', 'Geschichten', 'ALLE01'),
('ANGL0901', 'Secret', 'FRAN01'),
('ANGL0902', 'Secret', 'ANGL01'),
('ANGL0903', 'Geheimnis', 'ALLE01'),
('ANGL1001', 'We heart it', 'FRAN01'),
('ANGL1002', 'We heart it', 'ANGL01'),
('ANGL1003', 'Wir lieben es', 'ALLE01'),
('ANGL1101', 'Yik Yak', 'FRAN01'),
('ANGL1102', 'Yik Yak', 'ANGL01'),
('ANGL1103', 'Yik Yak', 'ALLE01'),
('ANGL1201', 'Shots', 'FRAN01'),
('ANGL1202', 'Shots', 'ANGL01'),
('ANGL1203', 'Aufnahmen', 'ALLE01'),
('ANGL1301', 'Tik Tok', 'FRAN01'),
('ANGL1302', 'Tik Tok', 'ANGL01'),
('ANGL1303', 'Tik Tok', 'ALLE01'),
('ANGL1401', 'Recherche vocale', 'FRAN01'),
('ANGL1402', 'Voice search', 'ANGL01'),
('ANGL1403', 'Sprachsuche', 'ALLE01');

-- --------------------------------------------------------

--
-- Structure de la table `ARTICLE`
--

CREATE TABLE `ARTICLE` (
  `NumArt` char(10) NOT NULL,
  `DtCreA` date DEFAULT NULL,
  `LibTitrA` text,
  `LibChapoA` text,
  `LibAccrochA` text,
  `Parag1A` text,
  `LibSsTitr1` text,
  `Parag2A` text,
  `LibSsTitr2` text,
  `Parag3A` text,
  `LibConclA` text,
  `UrlPhotA` char(62) DEFAULT NULL,
  `Likes` int(11) DEFAULT NULL,
  `NumAngl` char(8) NOT NULL,
  `NumThem` char(8) NOT NULL,
  `NumLang` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ARTICLE`
--

INSERT INTO `ARTICLE` (`NumArt`, `DtCreA`, `LibTitrA`, `LibChapoA`, `LibAccrochA`, `Parag1A`, `LibSsTitr1`, `Parag2A`, `LibSsTitr2`, `Parag3A`, `LibConclA`, `UrlPhotA`, `Likes`, `NumAngl`, `NumThem`, `NumLang`) VALUES
('09', '2019-02-24', 'Lorem Ipsum : What is Lorem Ipsum?', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'Where can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'https://monsiteamoi.com/image.png', 6, 'ANGL0301', 'THE0102', 'FRAN01'),
('10', '2019-02-24', 'Lorem Ipsum : What is Lorem Ipsum?', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'https://monsiteamoi.com/image.png', 5, 'ANGL0301', 'THE0102', 'FRAN01'),
('11', '2019-01-09', 'Lorem Ipsum : Qu\'est-ce que le Lorem Ipsum?', 'Il n\'y a personne qui n\'aime la souffrance pour elle-même, qui ne la recherche et qui ne la veuille pour elle-même...', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'Pourquoi l\'utiliser?', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).\r\n\r\n', 'Où puis-je m\'en procurer?', 'Plusieurs variations de Lorem Ipsum peuvent être trouvées ici ou là, mais la majeure partie d\'entre elles a été altérée par l\'addition d\'humour ou de mots aléatoires qui ne ressemblent pas une seconde à du texte standard. Si vous voulez utiliser un passage du Lorem Ipsum, vous devez être sûr qu\'il n\'y a rien d\'embarrassant caché dans le texte. Tous les générateurs de Lorem Ipsum sur Internet tendent à reproduire le même extrait sans fin, ce qui fait de lipsum.com le seul vrai générateur de Lorem Ipsum. Iil utilise un dictionnaire de plus de 200 mots latins, en combinaison de plusieurs structures de phrases, pour générer un Lorem Ipsum irréprochable. Le Lorem Ipsum ainsi obtenu ne contient aucune répétition, ni ne contient des mots farfelus, ou des touches d\'humour.', 'L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la traduction anglaise de H. Rackham (1914).', 'https://monsiteamoi.com/image.png', 0, 'ANGL0301', 'THE0104', 'FRAN01'),
('12', '2019-01-09', 'Lorem Ipsum : Qu\'est-ce que le Lorem Ipsum?', 'Le passage de Lorem Ipsum standard, utilisé depuis 1500', '« Lorem ipsum carottes, amélioré développeur de premier cycle, mais ils occaecat le temps et la vitalité, comme le travail et l\'obésité. Au fil des ans viennent, qui exercent nostrud, le travail du district scolaire, à moins qu\'ils aliquip d\'avantage. ', 'Les devoirs si le consommateur cupidatat trouver plaisir veut être un cillum de football, il fuit la douleur, ne produit pas obtenu. excepteur cupidatat noirs ne sont pas excepteur, est apaisante pour l\'âme, qui est, ils ont déserté les devoirs généraux de ceux qui sont à blâmer pour vos problèmes \".', 'Section du 10/01/32 « Le Extrêmes du Bien et du Mal » de CicSron (45 av.)', '« Mais je dois vous expliquer comment tout cela fausse idée de dénoncer le plaisir et louant la douleur, le tout exposer les enseignements réels de la grande vérité et le maître-bâtisseur de bonheur humain suffisant. Aucun de plaisir lui-même, parce qu\'il est la douleur ou évite, mais parce que conséquences de rencontre qui sont les douleurs de ceux qui sont à la recherche du plaisir rationnellement au courant. ni plus, toute personne appartenant à, ceux qui tranquillement ipsum quia dolor sit amet, consectetur, pour obtenir qu\'elle veut, mais parce qu\'ils ne jamais être attaché aux modes des temps de la chute afin que le travail et la douleur, un grand regard pour le plaisir. Télécharger l\'information en tant que vCard E , quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,ou celui qui évite une douleur qui ne produit aucun plaisir résultant? \"', 'Section 1.10.33 du \"Le Extrêmes du Bien et du Mal\" de CicSron (45 av.)', '« Mais la vérité d\'entre eux, et ils accusent et il est juste la haine digne de l\'ignominie, qui est le flatteries des plaisirs présents accusantium d\'entre eux corrompus de ces douleurs, et pour lequel il trouble excepturi ils sont aveuglés par le désir de ne pas se réfugier, et dans le même chapitre en faute qui remplissent un bureau, ils ont déserté la faiblesse générale de l\'esprit, qui est, de son travail et douloureux. Et ceux-ci, en effet, des choses simples et faciles aucune différence entre le. pour votre temps libre, et ils nous indépendants à le choix de l\'option et lorsqu\'ils ne sont pas perturbés par c\'était pas, ce qui avant tout faire ce que nous aimons, tout le plaisir est d\'être accueilli et toutes les douleurs évitées. Mais dans certaines circonstances, et ou de bons offices ou évite le plaisir des choses, il va souvent se produire ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"', 'Traduction de H. Rackham (1914)\r\n\"D\'un autre côté, nous dénonçons avec une indignation et une aversion justes des hommes qui sont tellement séduits et démoralisés par les charmes du plaisir du moment, si aveuglés par le désir, qu\'ils ne peuvent pas prévoir la douleur et les ennuis qui doivent s\'ensuivre; et égaux le blâme appartient à ceux qui manquent à leur devoir par faiblesse de volonté, ce qui revient à dire en reculant devant le labeur et la douleur. Ces cas sont parfaitement simples et faciles à distinguer. En une heure libre, lorsque notre pouvoir de choix est libre et quand rien n\'empêche que nous puissions faire ce que nous aimons le mieux, chaque plaisir doit être accueilli et chaque douleur évitée. Mais dans certaines circonstances et en raison des droits ou des obligations des entreprises, il arrive fréquemment que les plaisirs soient répudiés et les désagréments acceptés.Le sage tient donc toujours en ces matières à ce principe de sélection: il rejette les plaisirs pour obtenir d\'autres plaisirs plus grands, ou bien il endure des douleurs pour éviter des douleurs plus graves. \"', 'https://monsiteamoi.com/image.png', 10, 'ANGL0301', 'THE0104', 'FRAN01'),
('13', '2019-01-09', 'Lorem ipsum 1 : Nulla facilisi morbi tempus iaculis urna id volutpat lacus laoreet.', 'Scelerisque eu ultrices vitae auctor eu augue ut. Malesuada pellentesque elit eget gravida. ', 'Lorem ipsum 1 : Sed enim ut sem viverra. Pretium viverra suspendisse potenti nullam ac tortor vitae purus. Lorem donec massa sapien faucibus et molestie. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed velit dignissim sodales ut. Urna molestie at elementum eu facilisis sed odio morbi. Aliquam purus sit amet luctus. Sem nulla pharetra diam sit amet nisl. Netus et malesuada fames ac. Vel quam elementum pulvinar etiam. Leo a diam sollicitudin tempor id eu nisl. Venenatis tellus in metus vulputate eu scelerisque felis imperdiet. Ornare arcu dui vivamus arcu felis bibendum ut. Lorem ipsum dolor sit amet. Consectetur adipiscing elit ut aliquam purus sit amet luctus venenatis. Etiam tempor orci eu lobortis elementum. Nibh sit amet commodo nulla facilisi. Ante in nibh mauris cursus mattis molestie a.', 'Lorem ipsum : Odio morbi quis commodo odio aenean sed adipiscing diam donec. ', 'Lectus mauris ultrices eros in cursus turpis massa tincidunt. Interdum posuere lorem ipsum dolor sit amet consectetur adipiscing elit. Consectetur adipiscing elit duis tristique sollicitudin nibh sit amet. Habitant morbi tristique senectus et. Nisi vitae suscipit tellus mauris a diam. Duis convallis convallis tellus id interdum velit laoreet. Sollicitudin nibh sit amet commodo. Cras pulvinar mattis nunc sed blandit. Eu nisl nunc mi ipsum faucibus vitae aliquet nec. Id porta nibh venenatis cras sed felis eget velit aliquet.', 'Lorem ipsum 2 : Tempus quam pellentesque nec nam. Tortor consequat id porta nibh. Sociis natoque penatibus et magnis dis. ', 'Dolor sed viverra ipsum nunc. Tincidunt augue interdum velit euismod. Elementum curabitur vitae nunc sed velit dignissim sodales ut eu. Nulla porttitor massa id neque aliquam vestibulum. Risus in hendrerit gravida rutrum quisque. Tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Consectetur purus ut faucibus pulvinar elementum integer enim neque. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Nisl nisi scelerisque eu ultrices vitae auctor eu. Sit amet mauris commodo quis. A diam sollicitudin tempor id eu nisl nunc mi ipsum. Nullam eget felis eget nunc lobortis. Facilisis gravida neque convallis a cras. Ullamcorper a lacus vestibulum sed arcu. At imperdiet dui accumsan sit amet nulla facilisi morbi tempus. Tincidunt vitae semper quis lectus nulla at volutpat.', 'Sed turpis tincidunt id aliquet. Non diam phasellus vestibulum lorem sed. Scelerisque eleifend donec pretium vulputate sapien nec sagittis. Quis risus sed vulputate odio. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Nulla facilisi morbi tempus iaculis. Ac ut consequat semper viverra nam. Nisl nunc mi ipsum faucibus. Justo nec ultrices dui sapien eget mi proin sed libero. Donec massa sapien faucibus et molestie. Leo integer malesuada nunc vel risus. Consectetur adipiscing elit duis tristique. At elementum eu facilisis sed odio morbi quis commodo odio.', 'https://monsiteamoi.com/image.png', 8, 'ANGL0301', 'THE0104', 'FRAN01'),
('14', '2019-01-09', 'Lorem Ipsum: utilisation', 'Lorem ipsum : Il n\'y a personne qui n\'aime la souffrance pour elle-même, qui ne la recherche et qui ne la veuille pour elle-même...', 'Il n\'est pas plus loin, parce que ce sont les carottes de la douleur, Minneapolis, veut obtenir ... »', 'Lorem ipsum est un texte pseudo-latin utilisé dans la conception Web, la typographie, la mise en page et l\'impression à la place de l\'anglais pour mettre l\'accent sur les éléments de conception plutôt que sur le contenu. Il est également appelé texte d\'espace réservé (ou de remplissage). C\'est un outil pratique pour les maquettes. Il aide à définir les éléments visuels d\'un document ou d\'une présentation, par exemple la typographie, la police ou la mise en page. ', 'Sous-titre 1', 'Lorem ipsum fait principalement partie d\'un texte latin de l\'auteur et philosophe classique Cicéron. Ses mots et lettres ont été modifiés par ajout ou suppression, afin de rendre délibérément son contenu insensé; ce n\'est plus du latin authentique, correct ou compréhensible. Alors que lorem ipsumCela ressemble toujours au latin classique, il n\'a en fait aucune signification. Comme le texte de Cicéron ne contient pas les lettres K, W ou Z, étrangères au latin, celles-ci et d\'autres sont souvent insérées au hasard pour imiter l\'apparence typographique des langues européennes, de même que les digraphes qui ne figurent pas dans l\'original.', 'Sous-titre 2', 'Dans un contexte professionnel, il arrive souvent que des clients privés ou d\'entreprise rédigent une publication à faire et à présenter avec le contenu réel qui n\'est toujours pas prêt. Pensez à un blog d\'actualités rempli de contenu toutes les heures le jour de sa mise en ligne. Cependant, les examinateurs ont tendance à être distraits par un contenu compréhensible, par exemple, un texte aléatoire copié à partir d\'un journal ou d\'Internet. ', 'Ils sont susceptibles de se concentrer sur le texte, sans tenir compte de la mise en page et de ses éléments. En outre, le texte aléatoire risque d\'être involontairement humoristique ou offensant, un risque inacceptable dans les environnements d\'entreprise. Le Lorem ipsum et ses nombreuses variantes sont utilisés depuis le début des années 60 et très probablement depuis le XVIe siècle.', 'https://monsiteamoi.com/image.png', 20, 'ANGL0301', 'THE0101', 'FRAN01'),
('15', '2019-03-04', 'Lorem Ipsum: common examples', 'Most of its text is made up from sections 1.10.32–3 of Cicero\'s De finibus bonorum et malorum (On the Boundaries of Goods and Evils; finibus may also be translated as purposes). ', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit is the first known version (\"Neither is there anyone who loves grief itself since it is grief and thus wants to obtain it\"). ', 'It was found by Richard McClintock, a philologist, director of publications at Hampden-Sydney College in Virginia; he searched for citings of consectetur in classical Latin literature, a term of remarkably low frequency in that literary corpus.\r\nCicero famously orated against his political opponent Lucius Sergius Catilina. Occasionally the first Oration against Catiline is taken for type specimens: Quo usque tandem abutere, Catilina, patientia nostra? Quam diu etiam furor iste tuus nos eludet? (How long, O Catiline, will you abuse our patience? And for how long will that madness of yours mock us?)', 'Cicero\'s version of Liber Primus (first Book), sections 1.10.32–3 (fragments included in most Lorem Ipsum variants in red):', 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit amet, consectetur, adipisci[ng] velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?', 'Lorem Ipsum: translation\r\nThe Latin scholar H. Rackham translated the above in 1914:', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', 'https://mywebsite.com/image.png', 3, 'ANGL0602', 'THE0203', 'ANGL01'),
('16', '2019-02-20', 'Lorem Ipsum: variants and technical information', 'In 1985 Aldus Corporation launched its first desktop publishing program Aldus PageMaker for Apple Macintosh computers, released in 1987 for PCs running Windows 1.0.', 'Both contained the variant lorem ipsum most common today. Laura Perry, then art director with Aldus, modified prior versions of Lorem Ipsum text from typographical specimens; in the 1960s and 1970s it appeared often in lettering catalogs by Letraset. ', 'Anecdotal evidence has it that Letraset used Lorem ipsum already from 1970 onwards, eg. for grids (page layouts) for ad agencies. Many early desktop publishing programs, eg. Adobe PageMaker, used it to create template.', 'Lorem Ipsum: when, and when not to use it', 'Do you like Cheese Whiz? Spray tan? Fake eyelashes? That\'s what is Lorem Ipsum to many—it rubs them the wrong way, all the way. It\'s unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we\'d like our layouts and designs to be filled with real words, with thoughts that count, information that has value.\r\nThe toppings you may chose for that TV dinner pizza slice when you forgot to shop for foods, the paint you may slap on your face to impress the new boss is your business. But what about your daily bread? Design comps, layouts, wireframes—will your clients accept that you go about things the facile way? Authorities in our business will tell in no uncertain terms that Lorem Ipsum is that huge, huge no no to forswear forever. Not so fast, I\'d say, there are some redeeming factors in favor of greeking text, as its use is merely the symptom of a worse problem to take into consideration.', 'Lorem Ipsum: when, and when not to use it', 'You begin with a text, you sculpt information, you chisel away what\'s not needed, you come to the point, make things clear, add value, you\'re a content person, you like words. Design is no afterthought, far from it, but it comes in a deserved second. Anyway, you still use Lorem Ipsum and rightly so, as it will always have a place in the web workers toolbox, as things happen, not always the way you like it, not always in the preferred order. Even if your less into design and more into content strategy you may find some redeeming value with, wait for it, dummy copy, no less.\r\n\r\nConsider this: You made all the required mock ups for commissioned layout, got all the approvals, built a tested code base or had them built, you decided on a content management system, got a license for it or adapted open source software for your client\'s needs. Then the question arises: where\'s the content? Not there yet? That\'s not so bad, there\'s dummy copy to the rescue. But worse, what if the fish doesn\'t fit in the can, the foot\'s to big for the boot? Or to small? To short sentences, to many headings, images too large for the proposed design, or too small, or they fit in but it looks iffy for reasons the folks in the meeting can\'t quite tell right now, but they\'re unhappy, somehow. A client that\'s unhappy for a reason is a problem, a client that\'s unhappy though he or her can\'t quite put a finger on it is worse.', 'But. A big but: Lorem Ipsum is not t the root of the problem, it just shows what\'s going wrong. Chances are there wasn\'t collaboration, communication, and checkpoints, there wasn\'t a process agreed upon or specified with the granularity required. It\'s content strategy gone awry right from the start. Forswearing the use of Lorem Ipsum wouldn\'t have helped, won\'t help now. It\'s like saying you\'re a bad designer, use less bold text, don\'t use italics in every other paragraph. True enough, but that\'s not all that it takes to get things back on track.', 'https://meinsite.com/image.png', 4, 'ANGL0703', 'THE0302', 'ALLE01'),
('17', '2020-03-05', 'So Lorem Ipsum is bad (not necessarily)\r\n\r\n', 'There\'s lot of hate out there for a text that amounts to little more than garbled words in an old language. ', 'The villagers are out there with a vengeance to get that Frankenstein, wielding torches and pitchforks, wanting to tar and feather it at the least, running it out of town in shame.', 'One of the villagers, Kristina Halvorson from Adaptive Path, holds steadfastly to the notion that design can’t be tested without real content:\r\n\r\nI’ve heard the argument that “lorem ipsum” is effective in wireframing or design because it helps people focus on the actual layout, or color scheme, or whatever. What kills me here is that we’re talking about creating a user experience that will (whether we like it or not) be DRIVEN by words. The entire structure of the page or app flow is FOR THE WORDS.', 'If that\'s what you think how bout the other way around? How can you evaluate content without design? ', 'No typography, no colors, no layout, no styles, all those things that convey the important signals that go beyond the mere textual, hierarchies of information, weight, emphasis, oblique stresses, priorities, all those subtle cues that also have visual and emotional appeal to the reader. Rigid proponents of content strategy may shun the use of dummy copy but then designers might want to ask them to provide style sheets with the copy decks they supply that are in tune with the design direction they require.\r\n\r\nOr else, an alternative route: set checkpoints, networks, processes, junctions between content and layout. Depending on the state of affairs it may be fine to concentrate either on design or content, reversing gears when needed.\r\n\r\nOr maybe not. How about this: build in appropriate intersections and checkpoints between design and content. Accept that it’s sometimes okay to focus just on the content or just on the design.', 'Luke Wroblewski, currently a Product Director at Google, holds that fake data can break down in real life.', 'Using dummy content or fake information in the Web design process can result in products with unrealistic assumptions and potentially serious design flaws. A seemingly elegant design can quickly begin to bloat with unexpected content or break under the weight of actual activity. Fake data can ensure a nice looking layout but it doesn’t reflect what a living, breathing application must endure. Real data does.\r\nWebsites in professional use templating systems. Commercial publishing platforms and content management systems ensure that you can show different text, different data using the same template. When it\'s about controlling hundreds of articles, product pages for web shops, or user profiles in social networks, all of them potentially with different sizes, formats, rules for differing elements things can break, designs agreed upon can have unintended consequences and look much different than expected.\r\n\r\nThis is quite a problem to solve, but just doing without greeking text won\'t fix it. Using test items of real content and data in designs will help, but there\'s no guarantee that every oddity will be found and corrected. Do you want to be sure? Then a prototype or beta site with real content published from the real CMS is needed—but you’re not going that far until you go through an initial design cycle.', 'Lorem Ipsum actually is usefull in the design stage as it focuses our attention on places where the content is a dynamic block coming from the CMS (unlike static content elements that will always stay the same.) Blocks of Lorem Ipsum with a character count range provide a obvious reminder to check and re-check that the design and the content model match up.\r\n\r\nKyle Fiedler from the Design Informer feels that distracting copy is your fault:\r\n\r\nIf the copy becomes distracting in the design then you are doing something wrong or they are discussing copy changes. It might be a bit annoying but you could tell them that that discussion would be best suited for another time. At worst the discussion is at least working towards the final goal of your site where questions about lorem ipsum don’t.', 'https://meinsite.com/nice.png', 50, 'ANGL0703', 'THE0303', 'BULG01'),
('18', '2020-03-29', 'Entre Cin&eacute;ma et D&eacute;bat, les Passagers du r&eacute;el vous ouvrent leurs portes.', '&ldquo;Falsifier n&rsquo;est pas mentir&rdquo;, c&rsquo;est la pr&eacute;misse de cette travers&eacute;e de l&rsquo;oeuvre de Peter Watkins, qui nous est propos&eacute;e par le festival bordelais du 12 au 14 mars 2020. Les Passagers du R&eacute;el nous proposent ainsi un &ldquo;Re-jeu&rdquo; de l&rsquo;histoire, &agrave; travers une projection cin&eacute;matographique m&ecirc;lant Art, dystopie et faits historiques.', 'Peter Watkins : Retour sur un artiste qui divise', 'Entre exil et censure, Peter Watkins, r&eacute;alisateur Britannique du XX&egrave;me si&egrave;cle,  choque et offense l&rsquo;opinion publique. Dans son oeuvre tout comme dans sa vie priv&eacute;e, Watkins d&eacute;nonce un concept qu&rsquo;il nomme le &ldquo;monoforme&rdquo;, l&rsquo;id&eacute;e que l&rsquo;audiovisuel dit &ldquo;classique&rdquo; s&rsquo;inscrit dans une trame r&eacute;p&eacute;t&eacute;e, sans innovation quelconque. Il est &eacute;galement un critique virulent des m&eacute;dias de masse qu&rsquo;il accuse de manipuler l&rsquo;information dans le but de satisfaire des agendas politiques et &eacute;conomiques.\r\nMalgr&eacute; ses relations houleuses avec les grands noms de son temps, Peter Watkins et aujourd&rsquo;hui un r&eacute;alisateur tr&egrave;s respect&eacute;, notamment dans le milieu du cin&eacute;ma alternatif, o&ugrave; il est &agrave; l&rsquo;origine de nombreux mouvements. On peut notamment citer les films La Bombe et Punishment Park o&ugrave; fiction et documentaire se m&ecirc;lent, cr&eacute;ant un contexte anachronique o&ugrave; la pr&eacute;sence du &ldquo;journaliste&rdquo; est quasi-intradi&eacute;g&eacute;tique, notamment avec les apparitions succinctes de mat&eacute;riel de tournage dans des sc&egrave;nes de champs de bataille du 18&egrave;me si&egrave;cle ainsi que le Paris du XIX&egrave;me.\r\nUne autre particularit&eacute; de sa filmographie est d&ucirc;e &agrave; la dur&eacute;e parfois gargantuesque du visionnage de ses oeuvres. Les plus &eacute;vidents &eacute;tants Le Voyage avec une dur&eacute;e de 14h30 ainsi que La Commune, d&rsquo;une dur&eacute;e de 5h30.', 'Le Voyage : Entre Art, pacifisme et scandale', 'Fid&egrave;le &agrave; son titre, Le Voyage est une aventure cin&eacute;matographique d&rsquo;une dur&eacute;e record de 14h30, tourn&eacute; de 1983 &agrave; 1986 et sorti en 1987. Dans son oeuvre, Watkins d&eacute;nonce l&rsquo;armement nucl&eacute;aire, par le biais de t&eacute;moignages dans 12 pays diff&eacute;rents ainsi que de reconstitutions de guerres nucl&eacute;aires, particuli&egrave;rement graphiques. Le r&eacute;alisateur aborde, d&rsquo;un point de vue critique, les sujets de la course &agrave; l&rsquo;armement, des cons&eacute;quences radioactives, de la d&eacute;sinformation politique et du r&ocirc;le des m&eacute;dias de masse.\r\n	Comme le veut le style si particulier de Peter Watkins, le film s&rsquo;analyse en m&ecirc;me temps qu&rsquo;il se d&eacute;roule, par le biais de cartons et d&rsquo;une voix off ramenant le spectateur au processus de tournage des sc&egrave;nes pr&eacute;c&eacute;dentes.\r\n	Le film s&eacute;par&eacute; en modules d&rsquo;1h30, se verra refus&eacute; &agrave; la diffusion par toutes les cha&icirc;nes de t&eacute;l&eacute;vision. La raison: des images chocs, des t&eacute;moignages sans filtre, des reconstitutions morbidement r&eacute;alistes, et un angle extr&ecirc;mement critique de la sph&egrave;re politique et des m&eacute;dias de masse.\r\n	&Eacute;tant donn&eacute; sa place essentielle dans la filmographie de l&rsquo;artiste, deux module de 48 minutes de Le Voyage seront diffus&eacute;s en point final de la r&eacute;trospective.', 'La r&eacute;trospective : De projections en d&eacute;bats', 'Le festival des passagers du r&eacute;el aborde cette r&eacute;trospective sous trois angle diff&eacute;rents. Cin&eacute;matographique, premi&egrave;rement, avec une s&eacute;rie de projection des oeuvres les plus marquantes de Peter Watkins, de La Commune &agrave; Punishment Park, en passant bien entendu par Le Voyage, ainsi que de plusieurs court-m&eacute;trages et fictions audio traitant des th&egrave;mes similaires. Ensuite, plusieurs conf&eacute;rences seront tenu par des universitaires et des artistes, afin de procurer une analyse artistique ainsi qu&rsquo;historique de la filmographie du r&eacute;alisateur. Enfin, le festival se verra alimenter par nombreux d&eacute;bats, parfois publics pour discuter des interpr&eacute;tations possible de l&rsquo;oeuvre de Peter Watkins.\r\n	L&rsquo;une des oeuvres pr&eacute;sent&eacute;es au cours de ce festival n&rsquo;a pas &eacute;t&eacute; r&eacute;alis&eacute;e par Watkins, mais par Alain Damasio, &eacute;crivain de science-fiction et po&egrave;te fran&ccedil;ais. Fragments hack&eacute;s d&rsquo;un futur qui r&eacute;siste est donc une webs&eacute;rie audio traitant une ville dystopique o&ugrave; les espaces publiques ont &eacute;t&eacute; privatis&eacute;s. Elle fut premi&egrave;rement diffus&eacute; au festival des libert&eacute;s de Bruxelles en 2014, sous la forme des 6 extraits audios qui auraient &eacute;t&eacute; hack&eacute;s depuis le futur. Dans une soci&eacute;t&eacute; de corruption pouss&eacute; &agrave; son paroxysme, la mort d&rsquo;une humaine &ldquo;standard&rdquo; dans une zone &ldquo;premium&rdquo; mets le feu aux poudres et lance une r&eacute;sistance sans pr&eacute;c&eacute;dent.', 'En conclusion, l&rsquo;oeuvre de Peter Watkins, de part les th&egrave;mes tr&egrave;s divisifs abord&eacute;s et l&rsquo;abondance d&rsquo;&eacute;l&eacute;ments historiques, ainsi que le style de storytelling si particulier du r&eacute;alisateur, est tr&egrave;s sujette &agrave; une r&eacute;trospective tel que propos&eacute;e par Les passages du r&eacute;el. En effet, le festival donne la part belle &agrave; de nombreuses conf&eacute;rences et d&eacute;bats, propices &agrave; nombre d&rsquo;&eacute;changes culturels et intellectuels. Il permet &eacute;galement &agrave; d&rsquo;autres artistes, traitant de sujets similaires, de venir partager leurs oeuvres et leur points de vues.\r\nEnfin, l&rsquo;accessibilit&eacute; gratuite du festival fait de celui-ci une initiative de d&eacute;mocratisation artistique et culturelle, permet &agrave; ceux de tous milieux d&rsquo;appr&eacute;cier le temps de quelques jours, le monde complexe et passionnant du cin&eacute;ma.', '1585510375.jpeg', 0, 'ANGL0201', 'THE0101', 'FRAN01'),
('19', '2020-03-29', 'Bordeaux : le temple insoup&ccedil;onn&eacute;e du cin&eacute;ma d&rsquo;animation', 'Partons ensemble en voyage au coeur d&rsquo;un style de film bien particulier : l&rsquo;animation. Instinctivement, lorsque l&rsquo;on pense animation, on pense Japon, mangas, s&eacute;ries t&eacute;l&eacute;vis&eacute;es des ann&eacute;es 90. Pourtant, loin des &icirc;les nippones, c&rsquo;est bien ici, &agrave; Bordeaux, que ce style cin&eacute;matographique a trouv&eacute; sa cible, et conna&icirc;t un v&eacute;ritable essor aupr&egrave;s du grand public.', 'Un genre cin&eacute;matographique qui a le vent en poupe', '21. C&rsquo;est le nombre de films du studio Ghibli disponibles sur la plateforme de streaming Netflix. 21 joyaux du film d&rsquo;animation pr&eacute;sents sur une des plateformes les plus sollicit&eacute;es du grand public. C&rsquo;est un choix qui peut para&icirc;tre curieux, et qui pourtant traduit une demande, un besoin urgent du grand public d&rsquo;avoir acc&egrave;s aux films d&rsquo;animation.\r\nPourquoi l&rsquo;animation rencontre-elle un tel succ&egrave;s? L&rsquo;animation, c&rsquo;est un genre qui fait la promesse de r&eacute;unir petits et grands, d&rsquo;&eacute;prouver des &eacute;motions, des rires en famille, qui propose une libert&eacute; artistique sans limites et nous emm&egrave;ne tous en voyage le temps d&rsquo;une histoire, quel que soit notre &acirc;ge! Mangas, live-actions, court ou long m&eacute;trages sur une multitude de th&egrave;mes&hellip; Tous les go&ucirc;ts sont au rendez-vous! C&rsquo;est donc un genre loin d&rsquo;&ecirc;tre en mal d&rsquo;audience qui promet, pour qui s&rsquo;y int&eacute;resse, une belle diversit&eacute; de films, tant dans la narration que dans le style graphique. Mais que vient donc faire Bordeaux dans tout cela? Pourquoi Bordeaux a t-il un quelconque rapport avec le cin&eacute;ma d&rsquo;animation? \r\n\r\nPour prouver l&rsquo;engouement de la population bordelaise pour l&rsquo;animation, il suffit simplement de constater les nombreux salons et festivals qui fleurissent un peu partout &agrave; travers la ville. Au mois de Mars, c&rsquo;est le forum europ&eacute;en de coproduction de films d&rsquo;animation, Cartoon Movie qui occupe le devant de la sc&egrave;ne &agrave; Bordeaux, pour la quatri&egrave;me fois cons&eacute;cutive cette ann&eacute;e! Cr&eacute;&eacute; en 1999, cet &eacute;v&eacute;nement permet de r&eacute;unir plusieurs professionnels du domaine: investisseurs, producteurs ou encore distributeurs. Ce festival promouvoit les longs m&eacute;trages d&rsquo;animation r&eacute;alis&eacute;s pour l&rsquo;occasion, et permettent de mettre en lumi&egrave;re de belles oeuvres insoup&ccedil;onn&eacute;es, en d&eacute;bloquant des financements, en offrant une visibilit&eacute;, et bien sur, en nous offrant de merveilleux chef-d&rsquo;oeuvres et pourquoi pas le prochain film d&rsquo;animation du moment! Plus de 458,2 millions d&rsquo;euros ont &eacute;t&eacute; allou&eacute;s pour cette saison 2020. Preuve irr&eacute;futable que le secteur n&rsquo;est pas laiss&eacute; pour compte, et poss&egrave;de m&ecirc;me un avenir tr&egrave;s prometteur.', 'Des structures au service du septi&egrave;me art', 'Le film d&rsquo;animation a tellement conquis son public qu&rsquo;est n&eacute; la n&eacute;cessit&eacute; de cr&eacute;er des lieux destin&eacute;s &agrave; mettre en lumi&egrave;re cette source intarissable de diversit&eacute;. A Bordeaux, les salles de cin&eacute;mas ne manquent pas. Mais si malgr&eacute; tout, vous venez &agrave; vous lasser du classique CGR et de l&rsquo;UGC trop bond&eacute; de la place Gambetta, d&rsquo;autres options plus exotiques s&rsquo;offrent &agrave; vous! Certains &eacute;tablissements se sont laiss&eacute; convaincre, afin de trouver un &eacute;cho aupr&egrave;s du grand public, de se sp&eacute;cialiser dans un style cin&eacute;matographique unique. L&rsquo;Utopia en est un parfait exemple: &eacute;tabli dans une ancienne &eacute;glise, il projette une ribambelle de films ind&eacute;pendants dans une ambiance pittoresque. Mais pour les amoureux de l&rsquo;animation, ne cherchez plus : &ldquo;Le Festival&rdquo; est l&rsquo;endroit par excellence pour vous. Cette institution, situ&eacute;e barri&egrave;re de B&egrave;gles, est le premier et le seul cin&eacute;ma fran&ccedil;ais dont la programmation est exclusivement consacr&eacute;e au cin&eacute;ma d\'animation ainsi qu\'aux films &agrave; effets sp&eacute;ciaux.  Son parrain, le r&eacute;alisateur Michel Ocelot (r&eacute;alisateur entre autres de Kirikou et Azur et Azmar), vient r&eacute;guli&egrave;rement pr&eacute;senter ses films dans les 2 salles que propose ce cin&eacute;ma atypique. De quoi &eacute;toffer ses r&eacute;f&eacute;rences cin&eacute;matographiques en la mati&egrave;re!\r\n\r\nQue vous soyez &eacute;tudiants, cin&eacute;philes en herbe, ou juste p&eacute;tris d&rsquo;un ennui profond et en qu&ecirc;te de nouvelles exp&eacute;riences cin&eacute;matographiques &agrave; moindre co&ucirc;t,  \'\'Le Festival\'\' propose des prix d&eacute;fiant toute concurrence, mais &eacute;galement des soir&eacute;es &agrave; th&egrave;me, des s&eacute;ances d&eacute;guis&eacute;es, et vous promet de vous faire vivre une belle exp&eacute;rience, immerg&eacute;s dans un univers haut en couleurs. Ce temple de l&rsquo;animation accueille &eacute;galement quelques &eacute;v&eacute;nements tels que le festival international du film d\'animation \'\'Les Nuits Magiques\'\' ou bien le festival \'\'Les P\'tits Cartooneurs\'\', sur le film d&rsquo;animation pour la petite enfance, qu&rsquo;il serait dommage de manquer! Il est donc fortement recommand&eacute; d&rsquo;aller se promener vers barri&egrave;re de B&egrave;gles...', 'Made in Nouvelle Aquitaine: notre r&eacute;gion a du talent', 'A l&rsquo;&eacute;chelle mondiale, la France est en troisi&egrave;me position derri&egrave;re les Etats unis et le Japon en terme d&rsquo;industrie de l&rsquo;animation. C&rsquo;est une belle performance. Mais lorsqu&rsquo;on y regarde de plus pr&egrave;s, on se rend vite compte que notre cher Sud Ouest n&rsquo;y est pas pour rien. En effet, la r&eacute;gion Nouvelle-Aquitaine se positionne en tant que deuxi&egrave;me p&ocirc;le de production d\'animation derri&egrave;re la capitale fran&ccedil;aise. Un exploit possible gr&acirc;ce &agrave; deux r&eacute;servoirs &agrave; cr&eacute;ativit&eacute; : Bordeaux et Angoul&ecirc;me.\r\n\r\nAngoul&ecirc;me, capitale internationale de la Bande Dessin&eacute;e, ne se contente pas de ce seul titre et abrite plusieurs studios d&rsquo;animations, en pleine expansion - on peut citer le studio Hari - qui produisent nombre de s&eacute;ries t&eacute;l&eacute;vis&eacute;es diffus&eacute;es sur les cha&icirc;nes de jeunesse, comme Les As de la Jungle, ou La chouette (oui, c&rsquo;est made in Sud Ouest!). A Bordeaux aussi, plusieurs studios vid&eacute;os sont implant&eacute;s &ccedil;a et l&agrave;, et ont un r&ocirc;le moteur dans ce secteur.  Peu le savent, mais 45% des films d&rsquo;animation diffus&eacute;s &agrave; la t&eacute;l&eacute; fran&ccedil;aise sont con&ccedil;us en r&eacute;gion Nouvelle Aquitaine. Et ce chiffre est en augmentation. Une volont&eacute; de la part des collectivit&eacute; de valoriser ses savoirs faires et permettre &agrave; cet &eacute;lan de ne pas s\'essouffler et de promouvoir &agrave; la fois le talent fran&ccedil;ais mais aussi le dessin anim&eacute;. \r\nA l&rsquo;exportation, l&rsquo;animation fran&ccedil;aise rencontre aussi un franc succ&egrave;s, puisque c&rsquo;est le premier genre cin&eacute;matographique le plus demand&eacute;. Un peu plus de 170 millions d&rsquo;euros ont &eacute;t&eacute; investis dans des productions fran&ccedil;aises sur les 10 derni&egrave;res ann&eacute;es. L&agrave;, si vous pensez toujours que le potentiel du cin&eacute;ma d&rsquo;animation n&rsquo;est pas suffisant, on ne peut plus rien pour vous...', 'La production de films d&rsquo;animation est donc un secteur relativement dynamique, qui emploie de plus en plus de jeunes et qui a pour vocation de continuer &agrave; s&rsquo;&eacute;tendre. Une aubaine pour tous les passionn&eacute;s de graphisme et d&rsquo;animation qui ont toutes leurs chances de pouvoir sans doute r&eacute;aliser leur r&ecirc;ve et participer &agrave; la cr&eacute;ation du prochain dessin anim&eacute; &agrave; succ&egrave;s &agrave; la fran&ccedil;aise. Pour les autres, voil&agrave; une opportunit&eacute; de varier les plaisirs et d\'&eacute;toffer sa culture en s&rsquo;essayant ou en se plongeant davantage encore dans un style cin&eacute;matographique haut en couleurs et riche en aventures.', '1585510660.jpg', 0, 'ANGL0201', 'THE0103', 'FRAN01');
INSERT INTO `ARTICLE` (`NumArt`, `DtCreA`, `LibTitrA`, `LibChapoA`, `LibAccrochA`, `Parag1A`, `LibSsTitr1`, `Parag2A`, `LibSsTitr2`, `Parag3A`, `LibConclA`, `UrlPhotA`, `Likes`, `NumAngl`, `NumThem`, `NumLang`) VALUES
('20', '2020-03-29', 'Un festival Bordelais qui prend de l\'ampleur !', 'Si vous &ecirc;tes Bordelais, vous avez forc&eacute;ment d&eacute;j&agrave; entendu parler du FIFIB. La derni&egrave;re &eacute;dition, celle de 2019,  a rassembl&eacute; plus de 25000 spectateurs qui attendent avec impatience la prochaine.', '', 'Chaque ann&eacute;e, &agrave; bordeaux, a lieu le FIFIB ou Festival du Film Ind&eacute;pendant de Bordeaux. Il se d&eacute;roule mi-octobre depuis huit ans maintenant. Sa mission est simple : d&eacute;fendre le cin&eacute;ma ind&eacute;pendant mondial. Et si la t&acirc;che pouvait sembler difficilement surmontable, puisqu\'il s\'agit de faire d&eacute;couvrir des films et r&eacute;alisateurs inconnus, le festival s\'est donn&eacute; les moyens de r&eacute;ussir. La premi&egrave;re &eacute;dition, pr&eacute;sid&eacute;e par Nathalie Baye et marqu&eacute;e par la pr&eacute;sence d\'Olivier Assayas lors de la c&eacute;r&eacute;monie d\'ouverture pour la projection de son propre film. S\'ensuit ensuite une semaine de projection et de d&eacute;bats, proposant au public bordelais des films qui sortent des circuits de distributions classiques et qu\'il n\'aurait surement pas vu autrement. La premi&egrave;re &eacute;dition r&eacute;ussie, ouvrait de la plus belle des mani&egrave;res la voie aux suivantes, dans lesquels nous avons vu d&eacute;filer Abdellatif Kechiche, Roman Polanski, Julie Depardieu, F&eacute;lix Moati, Virginie Despentes ou encore B&eacute;atrice Dalle. Chaque &eacute;dition parvient &agrave; rassembler des cin&eacute;astes populaires tout en pr&eacute;sentant et en offrant de la visibilit&eacute; &agrave; des films de cin&eacute;astes moins connus.', 'Les films ind&eacute;pendants, mine d\'or du cin&eacute;ma', 'La force de ce festival, c\'est de proposer et de faire d&eacute;couvrir des r&eacute;alisateurs, acteurs et cin&eacute;astes. Le cin&eacute;ma ind&eacute;pendant d&eacute;signe tout ce qui est produit en dehors des grands studios et donc avec de petits budgets. Ce sont souvent des premiers films produits par de jeunes r&eacute;alisateurs prometteurs, qui ne trouvant pas de producteurs, se d&eacute;brouillent et sont contraint de r&eacute;aliser leur projet avec peu de financement. Une fois le film r&eacute;alis&eacute;, la principale difficult&eacute; que rencontrent ces r&eacute;alisateurs, c\'est la distribution. Ils ne peuvent pas se reposer sur l\'important r&eacute;seau que poss&egrave;de les grands producteurs et il est donc difficile de faire conna&icirc;tre son film. En France, nous avons la chance de poss&eacute;der l\'Association pour le cin&eacute;ma ind&eacute;pendant et sa diffusion, qui soutient la diffusion en salles de films ind&eacute;pendants. En plus de cela, il existe des r&eacute;seaux de cin&eacute;ma ind&eacute;pendants, dont l\'Utopia, un magnifique cin&eacute;ma accessible en plein centre de Bordeaux, place Camille Julian, o&ugrave; de nombreux films sont projet&eacute;s lors du FIFIB. Le FIFIB permet donc de d&eacute;couvrir les talents cach&eacute;s du cin&eacute;ma et ne se limite pas au cin&eacute;ma fran&ccedil;ais, bien au contraire. Chaque ann&eacute;e, la s&eacute;lection est compos&eacute;e majoritairement de films &eacute;trangers.', 'D&eacute;fendre Bordeaux et son ouverture culturelle', 'En presque 10 ans, le FIFIB a r&eacute;ussi un coup de maitre en s\'installant dans le calendrier des rendez-vous de la cr&eacute;ation cin&eacute;matographique. Bordeaux est souvent d&eacute;cri&eacute; pour sa pauvret&eacute; culturelle et son manque d\'ouverture, mais ce festival apporte un vent de fra&icirc;cheur &agrave; la ville et &agrave; son image. Et la s&eacute;lection de films du monde entier n\'est pas la seule origine &agrave; cette ouverture : le festival se distingue aussi par les th&eacute;matiques originales abord&eacute;es dans les films s&eacute;lectionn&eacute;s : religion, sexualit&eacute;, orientation sexuelle, &hellip; Si certains th&egrave;mes pouvaient paraitre marginaux il y a encore quelques ann&eacute;es, ce sont aujourd\'hui des sujets au centre de la soci&eacute;t&eacute;, ce qui propulse le FIFIB comme un festival moderne et pleinement int&eacute;gr&eacute; &agrave; son &eacute;poque. Les programmateurs osent, au risque parfois de choquer, d\'aller trop loin dans leur s&eacute;lection, mais le but reste de faire d&eacute;couvrir et r&eacute;fl&eacute;chir. Depuis plusieurs ann&eacute;es, le festival s\'accompagne aussi de concerts ouverts au public, intitul&eacute; les Nuits du FIFIB dans un cadre magnifique Cour Marbly, faisant de cette semaine un v&eacute;ritable f&ecirc;te.', 'Apr&egrave;s presque 10 ans d\'existence, FIFIB montre la voie, montre qu\'il est possible, une semaine par an, de proposer aux bordelais des films diff&eacute;rents et de s\'installer &agrave; l\'&eacute;chelle internationale. Ce festival ouvre la voie et l\'on observe d&eacute;j&agrave; plusieurs projets similaires se d&eacute;velopper &agrave; Bordeaux, comme Passagers du r&eacute;els par exemple &agrave; qui l\'on souhaite la m&ecirc;me r&eacute;ussite.', '1585510947.jpg', 0, 'ANGL0301', 'THE0101', 'FRAN01'),
('21', '2020-03-29', 'Les cin&eacute;mas bordelais &agrave; travers 75 ans d\'histoire', 'A la sortie de la seconde Guerre Mondiale, Bordeaux comptait pas loin de 50 cin&eacute;mas dit de &ldquo;quartier&rdquo; et &ldquo;d&rsquo;exclusivit&eacute;&rdquo;. Mais comment tant de monuments ont pu dispara&icirc;tre en quelques dizaines d&rsquo;ann&eacute;es ? Comment le cin&eacute;ma bordelais se r&eacute;sume aujourd&rsquo;hui &agrave; seulement le CGR, l&rsquo;UGC et Utopia ? L&rsquo;&eacute;quipe de L&rsquo;Avant Premi&egrave;re Bordelaise est partie enqu&ecirc;ter sur ces cin&eacute;mas disparus.', 'Une reconversion totale', 'Renova, Luxor, Nansouty, Rex et Intendance, tant de noms qui ont &eacute;crit l&rsquo;histoire. Mais tant de noms qui ne brillent plus de part leurs racines.\r\nLe R&eacute;nova qui fut la premi&egrave;re salle en capacit&eacute; d&rsquo;accueillir les mals entendants ferma en 1975. Le Lux, ferm&eacute; depuis 1966. Le Lido, situ&eacute; boulevard Godard, compl&eacute;ment ras&eacute;. Le Luxor transform&eacute; en r&eacute;sidences tout comme la Marivaux. Le Nansouty, situ&eacute; Cours de la Somme qui disparut dans les ann&eacute;es 60. Ou encore le Victoria qui se refit un nom avant de sombrer en 1974. Et la liste est encore longue.\r\nNous retrouvons d&rsquo;ailleurs beaucoup de tags et d&rsquo;oeuvres d&rsquo;artistes illustrant la disparition et l\'extinction du cin&eacute;ma dans la capitale de la Gironde.\r\nMais la premi&egrave;re question qui nous est venue, pourquoi tant de disparition ?', 'En qu&ecirc;te de raisons', 'Nous n\'imaginons pas l&rsquo;ampleur des fermetures de sites cin&eacute;matographiques &agrave; Bordeaux. Apr&egrave;s avoir d&eacute;roul&eacute; la liste des lieux touch&eacute;s. Nous avons d&eacute;cid&eacute; de partir enqu&ecirc;ter sur les causes de toutes ces fermetures.\r\nPremi&egrave;rement, beaucoup s&rsquo;accorde sur le fait que l&rsquo;enjeux &eacute;conomique y est pour beaucoup. En effet, Bordeaux, la France et le monde entier viennent d&rsquo;essuyer deux guerres sans pr&eacute;c&eacute;dents avec des d&eacute;g&acirc;ts tout autant in&eacute;dit. Il y a donc eu un double effet &eacute;conomique. D&rsquo;un c&ocirc;t&eacute;, certains cin&eacute;ma ont d&ucirc; faire face &agrave; la crise d&ucirc; aux nombreux manques et aux grandes pertes engendr&eacute;es. Mais de l&rsquo;autre c&ocirc;t&eacute;, la client&egrave;le est elle aussi devenu &ldquo;pauvre&rdquo;. Entra&icirc;nant donc une baisse de fr&eacute;quentation allant de 40 &agrave; 90% selon les lieux. Il f&ucirc;t donc difficile pour les cin&eacute;mas de tenir un compte favorable de maintenir une activit&eacute; p&eacute;renne. Certains n&rsquo;auront tenu que quelques mois, tandis que d&rsquo;autres continus de trouver des solutions pour finalement sombrer violemment quelques ann&eacute;es plus tard.\r\nLa deuxi&egrave;me cause de mortalit&eacute; des cin&eacute;mas serait les accidents. Nous avons par exemple constat&eacute; que certaines fermetures f&ucirc;t caus&eacute;es par des accidents ou des d&eacute;gradations volontaires et involontaires. Dans la plupart des cas, il n&rsquo;y avait pas assez d&rsquo;argent pour les r&eacute;novations.\r\nEt enfin, la troisi&egrave;me raison, selon certains habitants, est que dans tous les cas, il y avait d&eacute;j&agrave; beaucoup de trop de cin&eacute;ma par rapport au nombre d&rsquo;habitants. C&rsquo;est donc selon beaucoup de &ldquo;t&eacute;moins&rdquo; un sch&eacute;ma logique que d&rsquo;avoir vu autant de lieux mettre la cl&eacute; sous la porte.', 'Place &agrave; la &ldquo;nouvelle g&eacute;n&eacute;ration&rdquo;', 'C&rsquo;est il y a environ 25 ans que sont n&eacute;s les premiers cin&eacute;ma que nous connaissons encore aujourd&rdquo;hui. L&rsquo;UGC, autrefois appel&eacute; &ldquo;L&rsquo;Apollo&rdquo;, est r&eacute;nov&eacute; en fin du 20&egrave;me si&egrave;cle pour avoir une capacit&eacute; de onze salles. Des travaux &agrave; hauteur de 100 000 francs lui permettront m&ecirc;me de proposer 15 salles en 1998. C&rsquo;est le plus grand cin&eacute;ma de Bordeaux.\r\nViens ensuite en 2008, des travaux de d&eacute;molitions et de reconstruction pour faire place au nouveau CGR Le Fran&ccedil;ais que nous connaissons tous aujourd&rsquo;hui. C&rsquo;est d&rsquo;ailleurs de l&agrave; que na&icirc;tra une grande concurrence entre le CGR et l&rsquo;UGC, deux grands cin&eacute;ma sur une rive diff&eacute;rente proposant un programme quasiment identique.\r\nEnfin, parlons de l&rsquo;Utopia. Ce c&eacute;l&egrave;bre Cin&eacute;ma issu de la cha&icirc;ne Fran&ccedil;aise dont tout le monde parle pour voir des films diff&eacute;rents ou comme certains diront des &ldquo;films non commerciaux&rdquo;.\r\nCe sont donc aujourd&rsquo;hui les 3 seuls leaders de la cin&eacute;matographie Bordelaise en 2020.\r\nMais qu&rsquo;en pense donc la population ? Sur les passants que nous avons interrog&eacute;s &agrave; la sortie des cin&eacute;mas, beaucoup nous indique ne pas avoir connaissances du pass&eacute; cin&eacute;matographique de Bordeaux. Pour la plupart des habitants, le CGR et l&rsquo;UGC constituent un groupe tout comme l&rsquo;Utopia. Mais tant de cin&eacute;ma disparus ne serait-ce pas un &eacute;chec pour la lumi&egrave;re cin&eacute;matographique bordelaise &agrave; l&rsquo;&eacute;chelle nationale et m&ecirc;me internationale ?', 'Nous arrivons au terme de cette enqu&ecirc;te. Nos &eacute;quipes ont beaucoup travaill&eacute; pour rassembler les &eacute;l&eacute;ments permettant la publication de cet article. A savoir &eacute;galement que nous n&rsquo;affirmons pas &agrave; 100% la validit&eacute; de certains propos historiques &eacute;tant donn&eacute; que jusqu&rsquo;&agrave; aujourd&rsquo;hui, nous faisons encore des d&eacute;couvertes qui remettent en question des th&eacute;ories d&eacute;j&agrave; solides.', '1585511268.jpg', 0, 'ANGL0101', 'THE0105', 'FRAN01'),
('22', '2020-03-29', 'Bordeaux : cluster des tournages insolites ?', 'Jappeloup en 2011 ou encore Les Mis&eacute;rables en 1982, ne sont qu&rsquo;une petite partie des nombreux m&eacute;trages qui furent tourn&eacute;e au sein de la belle endormie. Dans cette article nous reviendrons sur l&rsquo;histoire du cin&eacute;ma de bordeaux &agrave; travers diff&eacute;rents exemples de lieux qui y ont particip&eacute;.', 'L&rsquo;avant du cin&eacute;ma bordelais', 'Le paysage bordelais, aujourd&rsquo;hui jonch&eacute; de cin&eacute;mas de cha&icirc;nes, tel que CGR ou UGC, fut autrefois le th&eacute;&acirc;tre de nombre de projections originales et ind&eacute;pendantes dans des cin&eacute;mas dits &ldquo;exclusifs&rdquo; et &ldquo;de quartiers&rdquo;. la ville comptait ainsi une quarantaine d&rsquo;&eacute;tablissements r&eacute;partis dans les lieux les plus populaires.\r\nLes cin&eacute;mas exclusifs offraient des projections en avant-premi&egrave;re, tandis que les cin&eacute;mas de quartiers projetaient ces films quelques mois apr&egrave;s. Ce ph&eacute;nom&egrave;ne, apparu aux alentours de la fin de la seconde guerre mondiale, dispara&icirc;tra peu &agrave; peu apr&egrave;s l\'arriv&eacute;e du cin&eacute;mascope puis de la t&eacute;l&eacute;vision, respectivement dans les ann&eacute;es 50 et 60.\r\nDe nombreux lieux, autrefois d&eacute;di&eacute;s au cin&eacute;ma, sont ainsi tomb&eacute;s dans l&rsquo;oubli, s&eacute;par&eacute;s de leur fonction artistique. Beaucoup de ces &eacute;tablissements peuvent &ecirc;tre d&eacute;finis comme insolite, on peut notamment citer L&rsquo;Eldorado, rue Lafontaine, aujourd&rsquo;hui une simple r&eacute;sidence. En activit&eacute; depuis 1908 il avait la particularit&eacute; de poss&eacute;der une cabine de projection avanc&eacute;e sur la salle, cr&eacute;ant ainsi une s&eacute;rie d\'alc&ocirc;ves sur les c&ocirc;t&eacute;s, d&eacute;di&eacute;s aux couples amoureux souhaitant un visionnage plus discret. Tout aussi insolite, l&rsquo;ABC et son toit ouvrant, aujourd&rsquo;hui un cabaret, autrefois  sp&eacute;cialis&eacute; en films de s&eacute;rie B et en western italiens (dits spaghettis).', 'Recyclage artistique', 'A l&rsquo;inverse de ce ph&eacute;nom&egrave;ne, certains lieux sans-histoire de bordeaux ont su trouver leur vocation dans la projection cin&eacute;matographique. Parmi ces miracul&eacute;s, l&rsquo;Utopia, v&eacute;ritable figure de proue du cin&eacute;ma &ldquo;Art et essais&rdquo; bordelais. Cette classification est une une d&eacute;nomination l&eacute;gale octroy&eacute; &agrave; certains &eacute;tablissements dans le but de promouvoir le cin&eacute;ma ind&eacute;pendant et/ou alternatif (de genre) et s&rsquo;accompagne d&rsquo;une subvention pour les salles de projections choisies.\r\nL&rsquo;origine d&rsquo;Utopia quant &agrave; elle est pour le moins insolite. En effet le b&acirc;timent est issue d&rsquo;une ancienne &eacute;glise catholique qui, selon certaines sources, daterait du 15&egrave;me si&egrave;cle, bien que cela e&ucirc;t &eacute;t&eacute; d&eacute;menti par d&rsquo;autres. L&rsquo;endroit abritera par la suite une salp&ecirc;tri&egrave;re, puis une usine, o&ugrave; sera notamment invent&eacute;e l&rsquo;outil n&eacute;cessaire &agrave; l&rsquo;ouverture d&rsquo;une bo&icirc;te de sardines. Le lieu sera enfin r&eacute;am&eacute;nag&eacute; en garage et en parking avant de finalement devenir l&rsquo;Utopia, plus grand cin&eacute;ma ind&eacute;pendant de la r&eacute;gion Nouvelle-Aquitaine.\r\nAujourd&rsquo;hui le lieu se caract&eacute;rise par sa tr&egrave;s grande vari&eacute;t&eacute;, ouvrant ses portes &agrave; de nombreux festivals de cin&eacute;ma souhaitant y tenir des projections, des conf&eacute;rences, ou encore des d&eacute;bats. On peut notamment citer le festival des passagers du r&eacute;el qui &agrave; r&eacute;alis&eacute; bon nombre de projections au sein de l&rsquo;Utopia, notamment son ouverture lors de la session de 2020.', 'Tournages sur les quais', 'Le Port de la Lune illumine les milieux de l&rsquo;art audiovisuel, mais pas seulement gr&acirc;ce aux projecteurs de ses salles. En effet ses quartiers ont maintes fois &eacute;taient le th&eacute;&acirc;tre de performances cin&eacute;matographiques, chacune grav&eacute;e &agrave; l&rsquo;encre d&rsquo;une pellicule.\r\n	On voit ainsi na&icirc;tre l&rsquo;oeuvre de Isabelle Breitman (aka Zabou), Se souvenir de Belles Choses, tourn&eacute; &agrave; bordeaux en 2002. Une sc&egrave;ne en particulier se d&eacute;marque : Il s&rsquo;agit d&rsquo;une sc&egrave;ne r&eacute;alis&eacute;e au mus&eacute;e des beaux arts devant le tableau de Bertrand-Jean Redon (aka Odilon), l&rsquo;homme ail&eacute; dit aussi l&rsquo;ange d&eacute;chu. Celui-ci, comme nombre, des productions de Redon traite des th&egrave;mes baudelairiens, ici l&rsquo;ange d&eacute;chu. Dans cette tr&egrave;s belle sc&egrave;ne, on voit Philippe, parler du tableau &agrave; Claire, et lui raconter une histoire. &agrave; intervalles, philippe confesse son envie d&rsquo;embrasser Claire tout en niant cette envie avant que les deux amants y succombent.\r\n	Bordeaux fut &eacute;galement mentionn&eacute; nombre de fois : Le corniaud,1967, on y voit le Grand Th&eacute;&acirc;tre et la Place de la Com&eacute;die ; A la folie, pas du tout, Audrey Tautou traverse le c&eacute;l&egrave;bre Pont de Pierre ; Vidocq, r&eacute;alis&eacute; en plein coeur du quartier St-Michel ; ou encore dans les plus connus, Jappeloup, pour sa sc&egrave;ne de course au stade Chaban Delmas.', 'Bordeaux est une ville qui a toujours eu un pied dans le cin&eacute;ma. Que ce soit par les cin&eacute;mas de quartiers, qui peuplaient autrefois ses all&eacute;es, comme l&rsquo;ABC et l&rsquo;Eldorado, ou par les g&eacute;ants du domaine qui jonchent aujourd&rsquo;hui ses boulevards comme l&rsquo;Utopia et le CGR. Nombre de tournages y ont eu lieu, qu&rsquo;ils soient c&eacute;l&egrave;bres ou anonymes, et chaque soir la Belle s&rsquo;endort avec l&rsquo;assurance que ces rues seront &agrave; nouveau grav&eacute;es sur la bobine d&rsquo;un cam&eacute;scope.', '1585511538.jpg', 0, 'ANGL0102', 'THE0104', 'FRAN01'),
('23', '2020-03-29', 'L&rsquo;Utopia l&rsquo;un des meilleur cin&eacute;ma alternatif et ind&eacute;pendant', 'D&eacute;nicher des Films introuvables dans les salles des grands cin&eacute;mas de vos villes. Voir des programmes diversifi&eacute;s ou la chance est donn&eacute;e ou des petits producteurs et distributeurs ind&eacute;pendants.', '', 'Destin&eacute; &agrave; un public averti, l\'Utopia est un cin&eacute;ma ind&eacute;pendant class&eacute;e &laquo; art et essaie &raquo;avec trois label &agrave; son nom &laquo; Jeune public &raquo;, &laquo; R&eacute;pertoire &raquo; et &laquo; Recherche et d&eacute;couverte &raquo;. Il accueille chaque ann&eacute;e de nombreux festivals tels que le &laquo; Festival La Classe ouvri&egrave;re ce n\'est pas du Cin&eacute;ma&rdquo;, le &ldquo;Festival des documentaires musicaux&rdquo;, la &ldquo;Semaine des Afriques&rdquo;, les &ldquo;Lettres du Monde &ldquo; et bien d\'autre. Mais l\'Utopia n\'est pas seulement un cin&eacute;ma alternatif il est aussi un lieu de rencontre avec les r&eacute;alisateurs, comme un lieu de d&eacute;bat sur des sujets de soci&eacute;t&eacute;. On appelle cela un cin&eacute;ma participatif.', 'Un cin&eacute;ma accessible et authentique', 'L\'Utopia Bordeaux se trouve 5, place Camille-Jullian, &agrave; l\'int&eacute;rieur de ce qui &eacute;tait l\'&eacute;glise Saint-Sim&eacute;on de Bordeaux, l\'Utopia a ouvert le 29 septembre 1999 et il est compos&eacute; de cinq salles de projection baroques ainsi qu\'un petit bar-restaurant pour vous retrouver avant et apr&egrave;s le film ou simplement pour y lire la presse litt&eacute;raire et satirique, de quoi ravir toute la famille. Du fait que les films &eacute;trangers sont tous projet&eacute;s en version originale sous-titr&eacute;e, l\'Utopia est le cin&eacute;ma le plus cosmopolite de la ville de Bordeaux. Toutes leurs projections sont garanties en version Originale. De plus, pour ravir les plus grands comme les plus petits l\'Utopia s\'offre la plus riche programmation enfantine disponible. Niveaux tarif d\'entrer vous aurez de quoi vous r&eacute;jouir, car le tarif social des places est largement inf&eacute;rieur &agrave; ceux des complexes cin&eacute;matographiques telles que M&eacute;ga CGR, M&eacute;garama, UGC&hellip; Nous sommes pour un TARIF NORMAL &agrave; 7&euro; pour un CARNET D\'ABONNEMENT &agrave; 50&euro; (10 places, non nominatives, non limit&eacute;es dans le temps et valables dans tous les Utopia), pour une s&eacute;ance sur fond gris &agrave; 4,50&euro; et pour nos plus jeune (moins de 14 ans) &agrave; 4,50 &euro;. Et ce n\'est pas tout, impliqu&eacute; dans la vie sociale bordelaise, l\'Utopia est consid&eacute;r&eacute; comme un &laquo; centre d\'animation gauchiste extr&ecirc;mement actif &raquo; par le maire, l\'Utopia Bordeaux participe par exemple &agrave; l\'organisation du Forum social local de Gironde. Ils sont &eacute;galement membres fondateurs de l\'association Ind&eacute;pendants, solidaires et f&eacute;d&eacute;r&eacute;s.', 'Les Objectifs de l&rsquo;Utopia', 'Le cin&eacute;ma Utopia de Bordeaux se d&eacute;finie comme un &laquo; projet d\'animation culturelle cin&eacute;matographique de proximit&eacute; &raquo;. Il entend contribuer &agrave; la diversit&eacute; culturelle locale et &agrave; la cr&eacute;ation de lien social.\r\nEssayant d\'&eacute;chapper &agrave; la seule r&egrave;gle du profit, Utopia tente de proposer une programmation vari&eacute;e et de donner une chance &agrave; des petits producteurs et distributeurs ind&eacute;pendants.\r\nLes cin&eacute;mas Utopia sont aussi un lieu de rencontre avec les r&eacute;alisateurs, mais aussi un lieu de d&eacute;bat sur des sujets de soci&eacute;t&eacute;, tel qu\'annonc&eacute; dans l\'accroche. Par exemple, lors du vote au sujet de la Constitution europ&eacute;enne, de nombreux d&eacute;bats ont eu lieu dans l\'enceinte des cin&eacute;mas Utopia. Plus r&eacute;cemment, le journaliste Serge Halimi est venu participer &agrave; un d&eacute;bat apr&egrave;s la projection de D&eacute;sentubages cathodiques, un documentaire tr&egrave;s critique par des m&eacute;dias t&eacute;l&eacute;visuels.\r\nAfin de contribuer &agrave; la diversit&eacute; culturelle, ce cin&eacute;ma alterne des films ind&eacute;pendants &agrave; petit budget (exemple : Ni vieux, ni tra&icirc;tres de Pierre Carles), souvent destin&eacute;s &agrave; un public relativement averti et des films &agrave; gros budgets (exemple : Le Seigneur des anneaux). De plus, l\'Utopia de Bordeaux tente de contribuer &agrave; la formation des jeunes publics en collaborant tout au long de l\'ann&eacute;e avec des &eacute;tablissements scolaires et parascolaires comme les centres de loisirs, mais aussi avec des associations s\'occupant d\'autistes, d\'alphab&eacute;tisation, etc.', 'L\'Utopia est le lieu id&eacute;ale pour admirer des films alternatifs et/ou ind&eacute;pendant, mais aussi pour se retrouver, &eacute;changer et d&eacute;battre autour de sujet actuel.', '1585511812.jpg', 0, 'ANGL0101', 'THE0106', 'FRAN01'),
('24', '2020-03-29', 'Le &quot;Cin&eacute;matographe lumi&egrave;re&quot; : les origines du cin&eacute;ma.', 'Bordeaux &agrave; toujours &eacute;t&eacute; un lieu de cultures, d\'arts et de d&eacute;couvertes.\r\nAujourd\'hui, revenons ensemble sur ce qui a permis au cin&eacute;ma que nous connaissons d\'exister : le &quot;Cin&eacute;matographe Lumi&egrave;re&quot;.', '', 'Nous sommes le Samedi 1er Mars 1896, &agrave; Bordeaux, et c\'est ici, 10 All&eacute;es de Tourny, que se tient l\'inauguration des premi&egrave;res s&eacute;ances publiques du Cin&eacute;matographe Lumi&egrave;re.\r\nCe n\'est pas la premi&egrave;re fois que l\'on peut assister &agrave; des projections d\'images anim&eacute;es. Depuis 1892, des repr&eacute;sentations payantes permettent de visionner sur grand &eacute;cran des dessins anim&eacute;s.\r\nElles peuvent rappeller les jouets optiques qui d&eacute;composaient les mouvements d\'un &ecirc;tre humain ou d\'un animal, destin&eacute;s &agrave; l\'origine &agrave; &eacute;tudier l\'action de tous les muscles d\'un corps lors d\'un d&eacute;placement rapide.\r\nSeulement ici nous ne parlons pas de dessins anim&eacute;s, ou d\'animations, mais de r&eacute;els films! En effet, pour la premi&egrave;re fois dans l\'histoire Bordelaise, les spectateurs assistent &agrave; des s&eacute;ances de projections de photographies anim&eacute;es.\r\nD&eacute;j&agrave; une dizaine lors de l\'inauguration, ces photographies sont pr&eacute;sent&eacute;s &agrave; la presse et quelques invit&eacute;s dans un premier temps.\r\nAm&eacute;nag&eacute;e dans un des salon de l\'excentrique h&ocirc;tel situ&eacute; pr&egrave;s du Grand Th&eacute;&acirc;tre, la premi&egrave;re salle de projection fait grande impression. L\'&eacute;v&eacute;nement fait la une des journaux locaux, parlant d\'&quot;une manifestation de la science dans ce qu\'elle a de plus curieux.&quot; (La Gironde).\r\nUne r&eacute;volution pour l\'&eacute;poque, ces projections r&eacute;ussissent &agrave; conqu&eacute;rir le public Bordelais. Mais que peuvent-elles bien repr&eacute;senter ?', 'Des repr&eacute;sentations &agrave; 1F l\'entr&eacute;e', 'Disponible au grand public d&egrave;s le lendemain, les repr&eacute;sentations ont lieu tous les jours, sans interruption, toutes les vingt minutes, de 14 heures &agrave; 23 heures (les Dimanches et F&ecirc;tes, elles commen&ccedil;aient &agrave; midi.).\r\nL\'entr&eacute;e est &agrave; 1 Franc, soit 15 centimes d\'euro!\r\nCes fameuses projections repr&eacute;sentaient en grandeur nature, comme le dit la Maison Lumi&egrave;re, &quot;les sc&egrave;nes les plus famili&egrave;res de la vie r&eacute;elle tout en reproduisant les moindres d&eacute;tails.&quot;. Autrement dit, elles diffusent des sc&eacute;nettes du quotidien, de courtes projections de la vie courante.\r\nMais ce qui passionne le public et le monde entier , c\'est l\'exactitude irr&eacute;prochable des plans, le r&eacute;alisme saisissant des images, la capacit&eacute; &agrave; retranscrire la v&eacute;rit&eacute; sans qu\'elle soit alt&eacute;r&eacute;e.\r\nC\'est une sensation nouvelle qui &eacute;merveille : &quot;l\'oeil se laisse doucement et d&eacute;licieusement duper !&quot; (Le Nouvelliste).\r\n&Agrave; voir ces hommes et ces femmes, s\'extasier devant des sc&egrave;nes si simple, se contentant d\'appr&eacute;cier le r&eacute;alisme des plans, cela nous ferait regretter les courts-m&eacute;trages et films d\'auteurs inconnus, cach&eacute;s dans l\'ombre du cin&eacute;ma industriel.', 'Qu\'est-ce qui a chang&eacute; ?', 'Les courts-m&eacute;trages, les films d\'auteurs ou encore les films exp&eacute;rimentaux font partie des ces films inconnus et quasiment introuvables, tant le cin&eacute;ma industriel est pr&eacute;pond&eacute;rant et omnipr&eacute;sent. En dehors des &eacute;v&egrave;nements, des projections priv&eacute;es ou des prestations, le cin&eacute;ma alternatif ne sait s\'&eacute;panouir et ne trouve ni sa place ni son public.\r\nIl ne fait presque m&ecirc;me plus &eacute;cho au cin&eacute;ma tant il est mis de c&ocirc;t&eacute;.\r\nAlors qu\'est devenu le cin&eacute;ma aujourd\'hui ? \r\nDe grands acteurs, des budgets faramineux, des films toujours plus long, de grandes enseignes, des sagas, des prequels, des suites, des r&eacute;adaptations, encore des suites&hellip;\r\nLe cin&eacute;ma industriel repr&eacute;sente aujourd\'hui une usine &agrave; profit qui produit en masse des films ternes, qui se ressemblent et s\'assemblent (crossover) afin de g&eacute;n&eacute;rer le plus d\'entr&eacute;e possible.\r\nBien loin des id&eacute;aux de l\'&eacute;poque, les films ne sont plus une manifestation du r&eacute;el, ils ne racontent plus rien. Inventant univers et personnages, il est difficile pour les films d\'aujourd\'hui de porter un message raccroch&eacute; &agrave; notre vie, certains y arrivent, beaucoup d\'autres n\'essaient m&ecirc;me pas!', 'Quand on regarde les d&eacute;buts du cin&eacute;ma et ce qu\'il repr&eacute;sente, face au cin&eacute;ma de notre si&egrave;cle.\r\nOn est en droit de se demander :\r\nFinalement, le cin&eacute;ma alternatif est-il si &eacute;loign&eacute; que &ccedil;a de ce qu\'&eacute;tait &agrave; l\'&eacute;poque consid&eacute;r&eacute; comme le cin&eacute;ma classique?', '1585512426.jpg', 0, 'ANGL0101', 'THE0105', 'FRAN01');

-- --------------------------------------------------------

--
-- Structure de la table `COMMENT`
--

CREATE TABLE `COMMENT` (
  `NumCom` char(6) NOT NULL,
  `DtCreC` datetime DEFAULT NULL,
  `PseudoAuteur` char(20) NOT NULL,
  `EmailAuteur` char(60) NOT NULL,
  `TitrCom` char(60) NOT NULL,
  `LibCom` text NOT NULL,
  `NumArt` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `COMMENT`
--

INSERT INTO `COMMENT` (`NumCom`, `DtCreC`, `PseudoAuteur`, `EmailAuteur`, `TitrCom`, `LibCom`, `NumArt`) VALUES
('001', '2020-01-09 10:13:43', 'Phil09', 'Phil09@me.com', 'Trop cool comme article', 'Trop cool comme article', '10'),
('002', '2020-01-02 13:18:42', 'TomyBl', 'TomyBl@me.com', 'Trop cool comme article', 'Trop cool comme article', '10'),
('003', '2020-01-04 16:21:12', 'Chouchou', 'Chouchou@me.com', 'Trop cool comme article', 'Trop cool comme article', '10'),
('004', '2020-01-05 03:15:38', 'Titi', 'Titi@me.com', 'Trop cool comme article', 'Trop cool comme article', '10'),
('005', '2020-01-06 21:16:36', 'Kiss', 'Kiss@me.com', 'Trop cool comme article', 'Trop cool comme article', '10'),
('006', '2020-01-06 11:20:31', 'Biss', 'Biss@me.com', 'Trop cool comme article', 'Trop cool comme article', '10'),
('007', '2020-01-08 08:41:12', 'Silou', 'silou@me.com', 'Trop cool comme article', 'Trop cool comme article', '10'),
('008', '2020-01-09 18:24:21', 'Phil09', 'Phil09@me.com', 'Trop cool comme article', 'Trop cool comme article', '12'),
('009', '2020-01-02 16:29:16', 'TomyBl', 'TomyBl@me.com', 'Trop cool comme article', 'Trop cool comme article', '12'),
('010', '2020-01-04 08:16:44', 'Chouchou', 'Chouchou@me.com', 'Trop cool comme article', 'Trop cool comme article', '12'),
('011', '2020-01-05 14:27:39', 'Titi', 'Titi@me.com', 'Trop cool comme article', 'Trop cool comme article', '12'),
('012', '2020-01-06 06:31:42', 'Kiss', 'Kiss@me.com', 'Trop cool comme article', 'Trop cool comme article', '12'),
('013', '2020-01-06 23:50:27', 'Biss', 'Biss@me.com', 'Trop cool comme article', 'Trop cool comme article', '12'),
('014', '2020-01-08 10:37:23', 'Silou', 'silou@me.com', 'Trop cool comme article', 'Trop cool comme article', '12'),
('015', '2020-01-09 15:31:17', 'Phil09', 'Phil09@me.com', 'Trop cool comme article', 'Trop cool comme article', '09'),
('016', '2020-02-15 08:31:23', 'TomyBl', 'TomyBl@me.com', 'Trop cool comme article', 'Trop cool comme article', '09'),
('017', '2020-02-19 06:28:00', 'Counter99', 'Counter99@me.com', 'Trop cool comme article', 'Trop cool comme article', '09'),
('018', '2020-02-28 07:30:21', 'Sisley33', 'Sisley33@me.com', 'Trop cool comme article', 'Trop cool comme article', '09'),
('019', '2020-02-29 17:31:38', 'Archie', 'Archie@me.com', 'Trop cool comme article', 'Trop cool comme article', '09'),
('020', '2020-02-29 09:31:27', 'Will\'s', 'Wills@me.com', 'Trop cool comme article', 'Trop cool comme article', '14'),
('021', '2020-03-02 16:33:41', 'Kiss29', 'Kiss29@me.com', 'Trop cool comme article', 'Trop cool comme article', '10'),
('022', '2020-03-03 12:41:47', 'Will\'s', 'Wills@me.com', 'Trop cool comme article', 'Trop cool comme article', '13'),
('023', '2020-03-04 10:33:42', 'Silou', 'silou@me.com', 'Trop cool comme article', 'Trop cool comme article', '14');

-- --------------------------------------------------------

--
-- Structure de la table `DATE`
--

CREATE TABLE `DATE` (
  `DtJour` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `DATE`
--

INSERT INTO `DATE` (`DtJour`) VALUES
('2017-12-12 00:00:00'),
('2018-11-09 00:00:00'),
('2018-12-01 00:00:00'),
('2018-12-12 00:00:00'),
('2018-12-12 09:00:00'),
('2018-12-12 11:00:00'),
('2018-12-13 00:00:00'),
('2018-12-17 00:00:00'),
('2018-12-18 00:00:00'),
('2019-01-11 00:00:00'),
('2019-01-13 00:00:00'),
('2019-01-17 00:00:00'),
('2019-02-22 14:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `LANGUE`
--

CREATE TABLE `LANGUE` (
  `NumLang` char(8) NOT NULL,
  `Lib1Lang` char(25) DEFAULT NULL,
  `Lib2Lang` char(45) DEFAULT NULL,
  `NumPays` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `LANGUE`
--

INSERT INTO `LANGUE` (`NumLang`, `Lib1Lang`, `Lib2Lang`, `NumPays`) VALUES
('ALLE01', 'Allemand(e)', 'Langue allemande', 'ALLE'),
('ANGL01', 'Anglais(e)', 'Langue anglaise', 'ANGL'),
('BULG01', 'Bulgare', 'Langue bulgare', 'BULG'),
('ESPA01', 'Espagnol(e)', 'Langue espagnole', 'ESPA'),
('FRAN01', 'Français(e)', 'Langue française', 'FRAN'),
('ITAL01', 'Italien(ne)', 'Langue italienne', 'ITAL'),
('RUSS01', 'Russe', 'Langue russe', 'RUSS'),
('UKRA01', 'Ukrainien(ne)', 'Langue ukrainienne', 'UKRA');

-- --------------------------------------------------------

--
-- Structure de la table `MOTCLE`
--

CREATE TABLE `MOTCLE` (
  `NumMoCle` char(8) NOT NULL,
  `LibMoCle` char(30) DEFAULT NULL,
  `NumLang` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `MOTCLE`
--

INSERT INTO `MOTCLE` (`NumMoCle`, `LibMoCle`, `NumLang`) VALUES
('MTCL0101', 'Mot1', 'FRAN01'),
('MTCL0102', 'Mot2', 'FRAN01'),
('MTCL0103', 'Mot3', 'FRAN01'),
('MTCL0104', 'Mot4', 'FRAN01'),
('MTCL0105', 'Mot5', 'FRAN01'),
('MTCL0106', 'Mot6', 'FRAN01'),
('MTCL0107', 'Mot7', 'FRAN01'),
('MTCL0108', 'Mot8', 'FRAN01'),
('MTCL0109', 'Mot9', 'FRAN01'),
('MTCL0110', 'Mot10', 'FRAN01'),
('MTCL0111', 'Mot11', 'FRAN01'),
('MTCL0112', 'Mot12', 'FRAN01'),
('MTCL0113', 'Mot13', 'FRAN01'),
('MTCL0114', 'Mot14', 'FRAN01'),
('MTCL0115', 'Mot15', 'FRAN01'),
('MTCL0116', 'Peter', 'FRAN01'),
('MTCL0117', 'Watkins', 'FRAN01'),
('MTCL0118', 'R&eacute;trospective', 'FRAN01'),
('MTCL0119', 'Voyage', 'FRAN01'),
('MTCL0120', 'Festival', 'FRAN01'),
('MTCL0121', 'Cin&eacute;ma', 'FRAN01'),
('MTCL0122', 'Cinema', 'FRAN01'),
('MTCL0123', 'Animation', 'FRAN01'),
('MTCL0124', 'Nouvelle-aquitaine', 'FRAN01'),
('MTCL0125', 'Bordeaux', 'FRAN01'),
('MTCL0126', 'Angoul&ecirc;me', 'FRAN01'),
('MTCL0127', 'Jeunesse', 'FRAN01'),
('MTCL0128', 'Fifib', 'FRAN01'),
('MTCL0129', 'Ind&eacute;pendant', 'FRAN01'),
('MTCL0130', 'Utopia', 'FRAN01'),
('MTCL0131', 'International', 'FRAN01'),
('MTCL0132', 'Histoire', 'FRAN01'),
('MTCL0133', 'Rex', 'FRAN01'),
('MTCL0134', 'Insolite', 'FRAN01'),
('MTCL0135', 'Quartier', 'FRAN01'),
('MTCL0136', 'Tournages', 'FRAN01'),
('MTCL0137', 'Art', 'FRAN01'),
('MTCL0138', 'Ind&eacute;pedant', 'FRAN01'),
('MTCL0139', 'Alternatif', 'FRAN01'),
('MTCL0140', 'Film', 'FRAN01'),
('MTCL0141', '', 'FRAN01'),
('MTCL0142', 'Cin&eacute;matographe', 'FRAN01'),
('MTCL0201', 'Word1', 'ANGL01'),
('MTCL0202', 'Word2', 'ANGL01'),
('MTCL0203', 'Word3', 'ANGL01'),
('MTCL0204', 'Word4', 'ANGL01'),
('MTCL0205', 'Word5', 'ANGL01'),
('MTCL0206', 'Word6', 'ANGL01'),
('MTCL0207', 'Word7', 'ANGL01'),
('MTCL0208', 'Word8', 'ANGL01'),
('MTCL0209', 'Word9', 'ANGL01'),
('MTCL0210', 'Word10', 'ANGL01'),
('MTCL0211', 'Word11', 'ANGL01'),
('MTCL0212', 'Word12', 'ANGL01'),
('MTCL0301', 'Wort1', 'ALLE01'),
('MTCL0302', 'Wort2', 'ALLE01'),
('MTCL0303', 'Wort3', 'ALLE01'),
('MTCL0304', 'Wort4', 'ALLE01'),
('MTCL0305', 'Wort5', 'ALLE01'),
('MTCL0306', 'Wort6', 'ALLE01'),
('MTCL0307', 'Wort7', 'ALLE01'),
('MTCL0308', 'Wort8', 'ALLE01'),
('MTCL0309', 'Wort9', 'ALLE01'),
('MTCL0310', 'Wort10', 'ALLE01'),
('MTCL0311', 'Wort11', 'ALLE01'),
('MTCL0312', 'Wort12', 'ALLE01'),
('MTCL0401', 'дума 1', 'BULG01'),
('MTCL0402', 'дума 2', 'BULG01'),
('MTCL0403', 'дума 3', 'BULG01'),
('MTCL0404', 'дума 4', 'BULG01'),
('MTCL0405', 'дума 5', 'BULG01'),
('MTCL0406', 'дума 6', 'BULG01'),
('MTCL0501', 'Palabra 1', 'ESPA01'),
('MTCL0502', 'Palabra 2', 'ESPA01'),
('MTCL0503', 'Palabra 3', 'ESPA01'),
('MTCL0504', 'Palabra 4', 'ESPA01'),
('MTCL0505', 'Palabra 5', 'ESPA01'),
('MTCL0506', 'Palabra 6', 'ESPA01'),
('MTCL0601', 'Parola 1', 'ITAL01'),
('MTCL0602', 'Parola 2', 'ITAL01'),
('MTCL0603', 'Parola 3', 'ITAL01'),
('MTCL0604', 'Parola 4', 'ITAL01'),
('MTCL0605', 'Parola 5', 'ITAL01'),
('MTCL0606', 'Parola 6', 'ITAL01'),
('MTCL0701', 'Cлово 1', 'RUSS01'),
('MTCL0702', 'Cлово 2', 'RUSS01'),
('MTCL0703', 'Cлово 3', 'RUSS01'),
('MTCL0704', 'Cлово 4', 'RUSS01'),
('MTCL0705', 'Cлово 5', 'RUSS01'),
('MTCL0706', 'Cлово 6', 'RUSS01');

-- --------------------------------------------------------

--
-- Structure de la table `MOTCLEARTICLE`
--

CREATE TABLE `MOTCLEARTICLE` (
  `NumArt` char(10) NOT NULL,
  `NumMoCle` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `MOTCLEARTICLE`
--

INSERT INTO `MOTCLEARTICLE` (`NumArt`, `NumMoCle`) VALUES
('10', 'MTCL0101'),
('10', 'MTCL0102'),
('10', 'MTCL0104'),
('11', 'MTCL0104'),
('10', 'MTCL0106'),
('11', 'MTCL0107'),
('10', 'MTCL0108'),
('11', 'MTCL0108'),
('11', 'MTCL0109'),
('18', 'MTCL0116'),
('18', 'MTCL0117'),
('18', 'MTCL0118'),
('18', 'MTCL0119'),
('18', 'MTCL0120'),
('20', 'MTCL0120'),
('18', 'MTCL0121'),
('20', 'MTCL0121'),
('21', 'MTCL0121'),
('22', 'MTCL0121'),
('23', 'MTCL0121'),
('19', 'MTCL0122'),
('24', 'MTCL0122'),
('19', 'MTCL0123'),
('19', 'MTCL0124'),
('19', 'MTCL0125'),
('20', 'MTCL0125'),
('21', 'MTCL0125'),
('24', 'MTCL0125'),
('19', 'MTCL0126'),
('19', 'MTCL0127'),
('20', 'MTCL0128'),
('20', 'MTCL0129'),
('22', 'MTCL0129'),
('20', 'MTCL0130'),
('22', 'MTCL0130'),
('23', 'MTCL0130'),
('20', 'MTCL0131'),
('21', 'MTCL0132'),
('24', 'MTCL0132'),
('21', 'MTCL0133'),
('22', 'MTCL0134'),
('22', 'MTCL0135'),
('22', 'MTCL0136'),
('22', 'MTCL0137'),
('23', 'MTCL0138'),
('23', 'MTCL0139'),
('23', 'MTCL0140'),
('24', 'MTCL0142'),
('15', 'MTCL0203'),
('15', 'MTCL0208'),
('15', 'MTCL0210'),
('15', 'MTCL0211'),
('16', 'MTCL0301'),
('16', 'MTCL0303'),
('16', 'MTCL0305'),
('16', 'MTCL0307'),
('16', 'MTCL0308'),
('16', 'MTCL0310'),
('16', 'MTCL0311'),
('16', 'MTCL0312');

-- --------------------------------------------------------

--
-- Structure de la table `PAYS`
--

CREATE TABLE `PAYS` (
  `idPays` int(11) NOT NULL,
  `cdPays` char(2) NOT NULL,
  `numPays` char(4) NOT NULL,
  `frPays` varchar(255) NOT NULL,
  `enPays` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `PAYS`
--

INSERT INTO `PAYS` (`idPays`, `cdPays`, `numPays`, `frPays`, `enPays`) VALUES
(1, 'AF', 'AFGH', 'Afghanistan', 'Afghanistan'),
(2, 'ZA', 'AFRI', 'Afrique du Sud', 'South Africa'),
(3, 'AL', 'ALBA', 'Albanie', 'Albania'),
(4, 'DZ', 'ALGE', 'Algérie', 'Algeria'),
(5, 'DE', 'ALLE', 'Allemagne', 'Germany'),
(6, 'AD', 'ANDO', 'Andorre', 'Andorra'),
(7, 'AO', 'ANGO', 'Angola', 'Angola'),
(8, 'AI', 'ANGU', 'Anguilla', 'Anguilla'),
(9, 'AQ', 'ARTA', 'Antarctique', 'Antarctica'),
(10, 'AG', 'ANTG', 'Antigua-et-Barbuda', 'Antigua & Barbuda'),
(11, 'AN', 'ANTI', 'Antilles néerlandaises', 'Netherlands Antilles'),
(12, 'SA', 'ARAB', 'Arabie saoudite', 'Saudi Arabia'),
(13, 'AR', 'ARGE', 'Argentine', 'Argentina'),
(14, 'AM', 'ARME', 'Arménie', 'Armenia'),
(15, 'AW', 'ARUB', 'Aruba', 'Aruba'),
(16, 'AU', 'AUST', 'Australie', 'Australia'),
(17, 'AT', 'AUTR', 'Autriche', 'Austria'),
(18, 'AZ', 'AZER', 'Azerbaïdjan', 'Azerbaijan'),
(19, 'BJ', 'BENI', 'Bénin', 'Benin'),
(20, 'BS', 'BAHA', 'Bahamas', 'Bahamas, The'),
(21, 'BH', 'BAHR', 'Bahreïn', 'Bahrain'),
(22, 'BD', 'BANG', 'Bangladesh', 'Bangladesh'),
(23, 'BB', 'BARB', 'Barbade', 'Barbados'),
(24, 'PW', 'BELA', 'Belau', 'Palau'),
(25, 'BE', 'BELG', 'Belgique', 'Belgium'),
(26, 'BZ', 'BELI', 'Belize', 'Belize'),
(27, 'BM', 'BERM', 'Bermudes', 'Bermuda'),
(28, 'BT', 'BHOU', 'Bhoutan', 'Bhutan'),
(29, 'BY', 'BIEL', 'Biélorussie', 'Belarus'),
(30, 'MM', 'BIRM', 'Birmanie', 'Myanmar (ex-Burma)'),
(31, 'BO', 'BOLV', 'Bolivie', 'Bolivia'),
(32, 'BA', 'BOSN', 'Bosnie-Herzégovine', 'Bosnia and Herzegovina'),
(33, 'BW', 'BOTS', 'Botswana', 'Botswana'),
(34, 'BR', 'BRES', 'Brésil', 'Brazil'),
(35, 'BN', 'BRUN', 'Brunei', 'Brunei Darussalam'),
(36, 'BG', 'BULG', 'Bulgarie', 'Bulgaria'),
(37, 'BF', 'BURK', 'Burkina Faso', 'Burkina Faso'),
(38, 'BI', 'BURU', 'Burundi', 'Burundi'),
(39, 'CI', 'IVOI', 'Côte d\'Ivoire', 'Ivory Coast (see Cote d\'Ivoire)'),
(40, 'KH', 'CAMB', 'Cambodge', 'Cambodia'),
(41, 'CM', 'CAME', 'Cameroun', 'Cameroon'),
(42, 'CA', 'CANA', 'Canada', 'Canada'),
(43, 'CV', 'CVER', 'Cap-Vert', 'Cape Verde'),
(44, 'CL', 'CHIL', 'Chili', 'Chile'),
(45, 'CN', 'CHIN', 'Chine', 'China'),
(46, 'CY', 'CHYP', 'Chypre', 'Cyprus'),
(47, 'CO', 'COLO', 'Colombie', 'Colombia'),
(48, 'KM', 'COMO', 'Comores', 'Comoros'),
(49, 'CG', 'CONG', 'Congo', 'Congo'),
(50, 'KP', 'CNOR', 'Corée du Nord', 'Korea, Demo. People s Rep. of'),
(51, 'KR', 'CSUD', 'Corée du Sud', 'Korea, (South) Republic of'),
(52, 'CR', 'RICA', 'Costa Rica', 'Costa Rica'),
(53, 'HR', 'CROA', 'Croatie', 'Croatia'),
(54, 'CU', 'CUBA', 'Cuba', 'Cuba'),
(55, 'DK', 'DANE', 'Danemark', 'Denmark'),
(56, 'DJ', 'DJIB', 'Djibouti', 'Djibouti'),
(57, 'DM', 'DOMI', 'Dominique', 'Dominica'),
(58, 'EG', 'EGYP', 'Égypte', 'Egypt'),
(59, 'AE', 'EMIR', 'Émirats arabes unis', 'United Arab Emirates'),
(60, 'EC', 'EQUA', 'Équateur', 'Ecuador'),
(61, 'ER', 'ERYT', 'Érythrée', 'Eritrea'),
(62, 'ES', 'ESPA', 'Espagne', 'Spain'),
(63, 'EE', 'ESTO', 'Estonie', 'Estonia'),
(64, 'US', 'USA_', 'États-Unis', 'United States'),
(65, 'ET', 'ETHO', 'Éthiopie', 'Ethiopia'),
(66, 'FI', 'FINL', 'Finlande', 'Finland'),
(67, 'FR', 'FRAN', 'France', 'France'),
(68, 'GE', 'GEOR', 'Géorgie', 'Georgia'),
(69, 'GA', 'GABO', 'Gabon', 'Gabon'),
(70, 'GM', 'GAMB', 'Gambie', 'Gambia, the'),
(71, 'GH', 'GANA', 'Ghana', 'Ghana'),
(72, 'GI', 'GIBR', 'Gibraltar', 'Gibraltar'),
(73, 'GR', 'GREC', 'Grèce', 'Greece'),
(74, 'GD', 'GREN', 'Grenade', 'Grenada'),
(75, 'GL', 'GROE', 'Groenland', 'Greenland'),
(76, 'GP', 'GUAD', 'Guadeloupe', 'Guinea, Equatorial'),
(77, 'GU', 'GUAM', 'Guam', 'Guam'),
(78, 'GT', 'GUAT', 'Guatemala', 'Guatemala'),
(79, 'GN', 'GUIN', 'Guinée', 'Guinea'),
(80, 'GQ', 'GUIE', 'Guinée équatoriale', 'Equatorial Guinea'),
(81, 'GW', 'GUIB', 'Guinée-Bissao', 'Guinea-Bissau'),
(82, 'GY', 'GUYA', 'Guyana', 'Guyana'),
(83, 'GF', 'GUYF', 'Guyane française', 'Guiana, French'),
(84, 'HT', 'HAIT', 'Haïti', 'Haiti'),
(85, 'HN', 'HOND', 'Honduras', 'Honduras'),
(86, 'HK', 'KONG', 'Hong Kong', 'Hong Kong, (China)'),
(87, 'HU', 'HONG', 'Hongrie', 'Hungary'),
(88, 'BV', 'BOUV', 'Ile Bouvet', 'Bouvet Island'),
(89, 'CX', 'CHRI', 'Ile Christmas', 'Christmas Island'),
(90, 'NF', 'NORF', 'Ile Norfolk', 'Norfolk Island'),
(91, 'KY', 'CAYM', 'Iles Cayman', 'Cayman Islands'),
(92, 'CK', 'COOK', 'Iles Cook', 'Cook Islands'),
(93, 'FO', 'FERO', 'Iles Féroé', 'Faroe Islands'),
(94, 'FK', 'FALK', 'Iles Falkland', 'Falkland Islands (Malvinas)'),
(95, 'FJ', 'FIDJ', 'Iles Fidji', 'Fiji'),
(96, 'GS', 'GEOR', 'Iles Géorgie du Sud et Sandwich du Sud', 'S. Georgia and S. Sandwich Is.'),
(97, 'HM', 'HEAR', 'Iles Heard et McDonald', 'Heard and McDonald Islands'),
(98, 'MH', 'MARS', 'Iles Marshall', 'Marshall Islands'),
(99, 'PN', 'PITC', 'Iles Pitcairn', 'Pitcairn Island'),
(100, 'SB', 'SALO', 'Iles Salomon', 'Solomon Islands'),
(101, 'SJ', 'SVAL', 'Iles Svalbard et Jan Mayen', 'Svalbard and Jan Mayen Islands'),
(102, 'TC', 'TURK', 'Iles Turks-et-Caicos', 'Turks and Caicos Islands'),
(103, 'VI', 'VIEA', 'Iles Vierges américaines', 'Virgin Islands, U.S.'),
(104, 'VG', 'VIEB', 'Iles Vierges britanniques', 'Virgin Islands, British'),
(105, 'CC', 'COCO', 'Iles des Cocos (Keeling)', 'Cocos (Keeling) Islands'),
(106, 'UM', 'MINE', 'Iles mineures éloignées des États-Unis', 'US Minor Outlying Islands'),
(107, 'IN', 'INDE', 'Inde', 'India'),
(108, 'ID', 'INDO', 'Indonésie', 'Indonesia'),
(109, 'IR', 'IRAN', 'Iran', 'Iran, Islamic Republic of'),
(110, 'IQ', 'IRAQ', 'Iraq', 'Iraq'),
(111, 'IE', 'IRLA', 'Irlande', 'Ireland'),
(112, 'IS', 'ISLA', 'Islande', 'Iceland'),
(113, 'IL', 'ISRA', 'Israël', 'Israel'),
(114, 'IT', 'ITAL', 'Italie', 'Italy'),
(115, 'JM', 'JAMA', 'Jamaïque', 'Jamaica'),
(116, 'JP', 'JAPO', 'Japon', 'Japan'),
(117, 'JO', 'JORD', 'Jordanie', 'Jordan'),
(118, 'KZ', 'KAZA', 'Kazakhstan', 'Kazakhstan'),
(119, 'KE', 'KNYA', 'Kenya', 'Kenya'),
(120, 'KG', 'KIRG', 'Kirghizistan', 'Kyrgyzstan'),
(121, 'KI', 'KIRI', 'Kiribati', 'Kiribati'),
(122, 'KW', 'KWEI', 'Koweït', 'Kuwait'),
(123, 'LA', 'LAOS', 'Laos', 'Lao People s Democratic Republic'),
(124, 'LS', 'LESO', 'Lesotho', 'Lesotho'),
(125, 'LV', 'LETT', 'Lettonie', 'Latvia'),
(126, 'LB', 'LIBA', 'Liban', 'Lebanon'),
(127, 'LR', 'LIBE', 'Liberia', 'Liberia'),
(128, 'LY', 'LIBY', 'Libye', 'Libyan Arab Jamahiriya'),
(129, 'LI', 'LIEC', 'Liechtenstein', 'Liechtenstein'),
(130, 'LT', 'LITU', 'Lituanie', 'Lithuania'),
(131, 'LU', 'LUXE', 'Luxembourg', 'Luxembourg'),
(132, 'MO', 'MACA', 'Macao', 'Macao, (China)'),
(133, 'MG', 'MADA', 'Madagascar', 'Madagascar'),
(134, 'MY', 'MALA', 'Malaisie', 'Malaysia'),
(135, 'MW', 'MALW', 'Malawi', 'Malawi'),
(136, 'MV', 'MALD', 'Maldives', 'Maldives'),
(137, 'ML', 'MALI', 'Mali', 'Mali'),
(138, 'MT', 'MALT', 'Malte', 'Malta'),
(139, 'MP', 'MARI', 'Mariannes du Nord', 'Northern Mariana Islands'),
(140, 'MA', 'MARO', 'Maroc', 'Morocco'),
(141, 'MQ', 'MART', 'Martinique', 'Martinique'),
(142, 'MU', 'MAUC', 'Maurice', 'Mauritius'),
(143, 'MR', 'MAUR', 'Mauritanie', 'Mauritania'),
(144, 'YT', 'MAYO', 'Mayotte', 'Mayotte'),
(145, 'MX', 'MEXI', 'Mexique', 'Mexico'),
(146, 'FM', 'MICR', 'Micronésie', 'Micronesia, Federated States of'),
(147, 'MD', 'MOLD', 'Moldavie', 'Moldova, Republic of'),
(148, 'MC', 'MONA', 'Monaco', 'Monaco'),
(149, 'MN', 'MONG', 'Mongolie', 'Mongolia'),
(150, 'MS', 'MONS', 'Montserrat', 'Montserrat'),
(151, 'MZ', 'MOZA', 'Mozambique', 'Mozambique'),
(152, 'NP', 'NEPA', 'Népal', 'Nepal'),
(153, 'NA', 'NAMI', 'Namibie', 'Namibia'),
(154, 'NR', 'NAUR', 'Nauru', 'Nauru'),
(155, 'NI', 'NICA', 'Nicaragua', 'Nicaragua'),
(156, 'NE', 'NIGE', 'Niger', 'Niger'),
(157, 'NG', 'NIGA', 'Nigeria', 'Nigeria'),
(158, 'NU', 'NIOU', 'Nioué', 'Niue'),
(159, 'NO', 'NORV', 'Norvège', 'Norway'),
(160, 'NC', 'NOUC', 'Nouvelle-Calédonie', 'New Caledonia'),
(161, 'NZ', 'NOUZ', 'Nouvelle-Zélande', 'New Zealand'),
(162, 'OM', 'OMAN', 'Oman', 'Oman'),
(163, 'UG', 'OUGA', 'Ouganda', 'Uganda'),
(164, 'UZ', 'OUZE', 'Ouzbékistan', 'Uzbekistan'),
(165, 'PE', 'PERO', 'Pérou', 'Peru'),
(166, 'PK', 'PAKI', 'Pakistan', 'Pakistan'),
(167, 'PA', 'PANA', 'Panama', 'Panama'),
(168, 'PG', 'PAPU', 'Papouasie-Nouvelle-Guinée', 'Papua New Guinea'),
(169, 'PY', 'PARA', 'Paraguay', 'Paraguay'),
(170, 'NL', 'PBAS', 'pays-Bas', 'Netherlands'),
(171, 'PH', 'PHIL', 'Philippines', 'Philippines'),
(172, 'PL', 'POLO', 'Pologne', 'Poland'),
(173, 'PF', 'POLY', 'Polynésie française', 'French Polynesia'),
(174, 'PR', 'RICO', 'Porto Rico', 'Puerto Rico'),
(175, 'PT', 'PORT', 'Portugal', 'Portugal'),
(176, 'QA', 'QATA', 'Qatar', 'Qatar'),
(177, 'CF', 'CAFR', 'République centrafricaine', 'Central African Republic'),
(178, 'CD', 'CONG', 'République démocratique du Congo', 'Congo, Democratic Rep. of the'),
(179, 'DO', 'DOMI', 'République dominicaine', 'Dominican Republic'),
(180, 'CZ', 'TCHE', 'République tchèque', 'Czech Republic'),
(181, 'RE', 'REUN', 'Réunion', 'Reunion'),
(182, 'RO', 'ROUM', 'Roumanie', 'Romania'),
(183, 'GB', 'MIQU', 'Royaume-Uni', 'Saint Pierre and Miquelon'),
(184, 'RU', 'RUSS', 'Russie', 'Russia (Russian Federation)'),
(185, 'RW', 'RWAN', 'Rwanda', 'Rwanda'),
(186, 'SN', 'SENE', 'Sénégal', 'Senegal'),
(187, 'EH', 'SAHA', 'Sahara occidental', 'Western Sahara'),
(188, 'KN', 'NIEV', 'Saint-Christophe-et-Niévès', 'Saint Kitts and Nevis'),
(189, 'SM', 'SMAR', 'Saint-Marin', 'San Marino'),
(190, 'PM', 'SPIE', 'Saint-Pierre-et-Miquelon', 'Saint Pierre and Miquelon'),
(191, 'VA', 'SSIE', 'Saint-Siège ', 'Vatican City State (Holy See)'),
(192, 'VC', 'SVIN', 'Saint-Vincent-et-les-Grenadines', 'Saint Vincent and the Grenadines'),
(193, 'SH', 'SLN_', 'Sainte-Hélène', 'Saint Helena'),
(194, 'LC', 'SLUC', 'Sainte-Lucie', 'Saint Lucia'),
(195, 'SV', 'SALV', 'Salvador', 'El Salvador'),
(196, 'WS', 'SAMO', 'Samoa', 'Samoa'),
(197, 'AS', 'SAMA', 'Samoa américaines', 'American Samoa'),
(198, 'ST', 'TOME', 'Sao Tomé-et-Principe', 'Sao Tome and Principe'),
(199, 'SC', 'SEYC', 'Seychelles', 'Seychelles'),
(200, 'SL', 'LEON', 'Sierra Leone', 'Sierra Leone'),
(201, 'SG', 'SING', 'Singapour', 'Singapore'),
(202, 'SI', 'SLOV', 'Slovénie', 'Slovenia'),
(203, 'SK', 'SLOQ', 'Slovaquie', 'Slovakia'),
(204, 'SO', 'SOMA', 'Somalie', 'Somalia'),
(205, 'SD', 'SOUD', 'Soudan', 'Sudan'),
(206, 'LK', 'SRIL', 'Sri Lanka', 'Sri Lanka (ex-Ceilan)'),
(207, 'SE', 'SUED', 'Suède', 'Sweden'),
(208, 'CH', 'SUIS', 'Suisse', 'Switzerland'),
(209, 'SR', 'SURI', 'Suriname', 'Suriname'),
(210, 'SZ', 'SWAZ', 'Swaziland', 'Swaziland'),
(211, 'SY', 'SYRI', 'Syrie', 'Syrian Arab Republic'),
(212, 'TW', 'TAIW', 'Taïwan', 'Taiwan'),
(213, 'TJ', 'TADJ', 'Tadjikistan', 'Tajikistan'),
(214, 'TZ', 'TANZ', 'Tanzanie', 'Tanzania, United Republic of'),
(215, 'TD', 'TCHA', 'Tchad', 'Chad'),
(216, 'TF', 'TERR', 'Terres australes françaises', 'French Southern Territories - TF'),
(217, 'IO', 'BOIN', 'Territoire britannique de l Océan Indien', 'British Indian Ocean Territory'),
(218, 'TH', 'THAI', 'Thaïlande', 'Thailand'),
(219, 'TL', 'TIMO', 'Timor Oriental', 'Timor-Leste (East Timor)'),
(220, 'TG', 'TOGO', 'Togo', 'Togo'),
(221, 'TK', 'TOKE', 'Tokélaou', 'Tokelau'),
(222, 'TO', 'TONG', 'Tonga', 'Tonga'),
(223, 'TT', 'TOBA', 'Trinité-et-Tobago', 'Trinidad & Tobago'),
(224, 'TN', 'TUNI', 'Tunisie', 'Tunisia'),
(225, 'TM', 'TURK', 'Turkménistan', 'Turkmenistan'),
(226, 'TR', 'TURQ', 'Turquie', 'Turkey'),
(227, 'TV', 'TUVA', 'Tuvalu', 'Tuvalu'),
(228, 'UA', 'UKRA', 'Ukraine', 'Ukraine'),
(229, 'UY', 'URUG', 'Uruguay', 'Uruguay'),
(230, 'VU', 'VANU', 'Vanuatu', 'Vanuatu'),
(231, 'VE', 'VENE', 'Venezuela', 'Venezuela'),
(232, 'VN', 'VIET', 'Viêt Nam', 'Viet Nam'),
(233, 'WF', 'WALI', 'Wallis-et-Futuna', 'Wallis and Futuna'),
(234, 'YE', 'YEME', 'Yémen', 'Yemen'),
(235, 'YU', 'YOUG', 'Yougoslavie', 'Saint Pierre and Miquelon'),
(236, 'ZM', 'ZAMB', 'Zambie', 'Zambia'),
(237, 'ZW', 'ZIMB', 'Zimbabwe', 'Zimbabwe'),
(238, 'MK', 'MACE', 'ex-République yougoslave de Macédoine', 'Macedonia, TFYR');

-- --------------------------------------------------------

--
-- Structure de la table `THEMATIQUE`
--

CREATE TABLE `THEMATIQUE` (
  `NumThem` char(8) NOT NULL,
  `LibThem` char(60) DEFAULT NULL,
  `NumLang` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `THEMATIQUE`
--

INSERT INTO `THEMATIQUE` (`NumThem`, `LibThem`, `NumLang`) VALUES
('THE0101', 'L\'événement', 'FRAN01'),
('THE0102', 'L\'acteur-clé', 'FRAN01'),
('THE0103', 'Le mouvement émergeant', 'FRAN01'),
('THE0104', 'L\'insolite / le clin d\'oeil', 'FRAN01'),
('THE0105', 'L\'Histoire', 'FRAN01'),
('THE0106', 'Lieu', 'FRAN01'),
('THE0201', 'The event', 'ANGL01'),
('THE0202', 'The key player', 'ANGL01'),
('THE0203', 'The emerging movement', 'ANGL01'),
('THE0204', 'The unusual / the wink', 'ANGL01'),
('THE0301', 'Die Veranstaltung', 'ALLE01'),
('THE0302', 'Der Schlüsselakteur', 'ALLE01'),
('THE0303', 'Die entstehende Bewegung', 'ALLE01'),
('THE0304', 'Das Ungewöhnliche / das Augenzwinkern', 'ALLE01');

-- --------------------------------------------------------

--
-- Structure de la table `USER`
--

CREATE TABLE `USER` (
  `Login` char(30) NOT NULL,
  `Pass` char(15) NOT NULL,
  `LastName` char(30) DEFAULT NULL,
  `FirstName` char(30) DEFAULT NULL,
  `EMail` char(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `USER`
--

INSERT INTO `USER` (`Login`, `Pass`, `LastName`, `FirstName`, `EMail`, `admin`) VALUES
('admin', 'admin', 'admin', 'admin', 'admin@gmail.com', 1),
('BarbieS9', 'P9#7xL', 'La Rousse', 'Julie', 'titou@gmail.com', 0),
('Chris45', 'Ut!D5?h0', 'Dupont', 'Jean', 'cricri@srf.fr', 0),
('Cruella', 'qL:5R!1', 'Mercury', 'Freddy', 'Cruella@free.fr', 0),
('PitouF', 'G0_f2;A', 'Durand', 'Joe', 'JoeStarr@free.fr', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ANGLE`
--
ALTER TABLE `ANGLE`
  ADD PRIMARY KEY (`NumAngl`),
  ADD KEY `ANGLE_FK` (`NumAngl`),
  ADD KEY `FK_ASSOCIATION_6` (`NumLang`);

--
-- Index pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD PRIMARY KEY (`NumArt`),
  ADD KEY `ARTICLE_FK` (`NumArt`),
  ADD KEY `FK_ASSOCIATION_1` (`NumAngl`),
  ADD KEY `FK_ASSOCIATION_2` (`NumThem`),
  ADD KEY `FK_ASSOCIATION_3` (`NumLang`);

--
-- Index pour la table `COMMENT`
--
ALTER TABLE `COMMENT`
  ADD PRIMARY KEY (`NumCom`),
  ADD KEY `COMMENT_FK` (`NumCom`),
  ADD KEY `FK_ASSOCIATION_7` (`NumArt`);

--
-- Index pour la table `DATE`
--
ALTER TABLE `DATE`
  ADD PRIMARY KEY (`DtJour`),
  ADD KEY `DATE_FK` (`DtJour`);

--
-- Index pour la table `LANGUE`
--
ALTER TABLE `LANGUE`
  ADD PRIMARY KEY (`NumLang`),
  ADD KEY `LANGUE_FK` (`NumLang`);

--
-- Index pour la table `MOTCLE`
--
ALTER TABLE `MOTCLE`
  ADD PRIMARY KEY (`NumMoCle`),
  ADD KEY `MOTCLE_FK` (`NumMoCle`),
  ADD KEY `FK_ASSOCIATION_5` (`NumLang`);

--
-- Index pour la table `MOTCLEARTICLE`
--
ALTER TABLE `MOTCLEARTICLE`
  ADD PRIMARY KEY (`NumArt`,`NumMoCle`),
  ADD KEY `MOTCLEARTICLE_FK` (`NumArt`),
  ADD KEY `MOTCLEARTICLE2_FK` (`NumMoCle`);

--
-- Index pour la table `PAYS`
--
ALTER TABLE `PAYS`
  ADD PRIMARY KEY (`idPays`),
  ADD KEY `PAYS_FK` (`idPays`);

--
-- Index pour la table `THEMATIQUE`
--
ALTER TABLE `THEMATIQUE`
  ADD PRIMARY KEY (`NumThem`),
  ADD KEY `THEMATIQUE_FK` (`NumThem`),
  ADD KEY `FK_ASSOCIATION_4` (`NumLang`);

--
-- Index pour la table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`Login`,`Pass`),
  ADD KEY `USER_FK` (`Login`,`Pass`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `PAYS`
--
ALTER TABLE `PAYS`
  MODIFY `idPays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ANGLE`
--
ALTER TABLE `ANGLE`
  ADD CONSTRAINT `FK_ASSOCIATION_6` FOREIGN KEY (`NumLang`) REFERENCES `LANGUE` (`NumLang`);

--
-- Contraintes pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD CONSTRAINT `FK_ASSOCIATION_1` FOREIGN KEY (`NumAngl`) REFERENCES `ANGLE` (`NumAngl`),
  ADD CONSTRAINT `FK_ASSOCIATION_2` FOREIGN KEY (`NumThem`) REFERENCES `THEMATIQUE` (`NumThem`),
  ADD CONSTRAINT `FK_ASSOCIATION_3` FOREIGN KEY (`NumLang`) REFERENCES `LANGUE` (`NumLang`);

--
-- Contraintes pour la table `COMMENT`
--
ALTER TABLE `COMMENT`
  ADD CONSTRAINT `FK_ASSOCIATION_7` FOREIGN KEY (`NumArt`) REFERENCES `ARTICLE` (`NumArt`);

--
-- Contraintes pour la table `MOTCLE`
--
ALTER TABLE `MOTCLE`
  ADD CONSTRAINT `FK_ASSOCIATION_5` FOREIGN KEY (`NumLang`) REFERENCES `LANGUE` (`NumLang`);

--
-- Contraintes pour la table `MOTCLEARTICLE`
--
ALTER TABLE `MOTCLEARTICLE`
  ADD CONSTRAINT `FK_MotCleArt1` FOREIGN KEY (`NumMoCle`) REFERENCES `MOTCLE` (`NumMoCle`),
  ADD CONSTRAINT `FK_MotCleArt2` FOREIGN KEY (`NumArt`) REFERENCES `ARTICLE` (`NumArt`);

--
-- Contraintes pour la table `THEMATIQUE`
--
ALTER TABLE `THEMATIQUE`
  ADD CONSTRAINT `FK_ASSOCIATION_4` FOREIGN KEY (`NumLang`) REFERENCES `LANGUE` (`NumLang`);
