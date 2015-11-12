DROP TABLE IF EXISTS public.site;
CREATE TABLE public.site (
  id BIGSERIAL PRIMARY KEY,
  nome VARCHAR(30) NOT NULL,
  intro TEXT NULL,
  logo VARCHAR(256) NULL,
  copyright VARCHAR(128) NULL);

DROP TABLE IF EXISTS public.compra;
DROP TABLE IF EXISTS public.anuncio;
CREATE TABLE public.anuncio (
  id BIGSERIAL PRIMARY KEY,
  titulo VARCHAR(60) NULL,
  imagem VARCHAR(256) NULL,
  descricao TEXT NULL,
  preco double precision NULL);

INSERT INTO site (nome, intro, logo, copyright) VALUES ('Bird Skeleton', 'Confira abaixo os anúncios disponíveis para você.', NULL, '2015 Marcel Bezerra da Silva. Todos os direitos reservados.');

INSERT INTO anuncio (titulo, imagem, descricao, preco) VALUES ('Corvo', NULL, 'In interdum dui eu nisl mollis, ut tincidunt felis placerat. Nulla egestas nunc tortor, in tristique neque malesuada vel. Pellentesque faucibus massa in ipsum convallis, eu euismod arcu auctor. Aenean ornare erat vel pulvinar mollis. Donec mollis eu amet.', '100');
INSERT INTO anuncio (titulo, imagem, descricao, preco) VALUES ('Chupim', NULL, 'Proin sed mauris sem. Curabitur a tellus sed sapien aliquam dignissim eu eu mauris. Sed et ante leo. Pellentesque pulvinar auctor quam, sit amet viverra augue rutrum ac. Nam volutpat ultrices finibus. Curabitur egestas orci eu vulputate ultricies posuere. ', '250');
INSERT INTO anuncio (titulo, imagem, descricao, preco) VALUES ('Pomba', NULL, 'Nulla eu hendrerit ipsum, non ornare neque. Sed molestie ex euismod condimentum pharetra. Vivamus congue tortor vitae lorem pellentesque, id blandit nibh aliquam. Duis venenatis sem in posuere efficitur. Nunc convallis est at purus maximus, non cras amet. ', '500');
INSERT INTO anuncio (titulo, imagem, descricao, preco) VALUES ('Urubu', NULL, 'Donec ligula dolor, congue sit amet purus sed, tincidunt faucibus orci. Cras vitae libero gravida tellus mattis sagittis. Praesent eget orci sed libero hendrerit viverra non et tortor. Pellentesque neque nibh, dapibus vitae ipsum eget, blandit massa nunc. ', '1000');

DROP TABLE IF EXISTS public.login;
DROP TABLE IF EXISTS public.perfil;
CREATE TABLE public.perfil (
  id BIGSERIAL PRIMARY KEY,
  nome VARCHAR(32) NOT NULL
);


INSERT INTO perfil (id, nome) VALUES (1, 'admin');
INSERT INTO perfil (id, nome) VALUES (2, 'consumidor');

DROP TABLE IF EXISTS public.login;
CREATE TABLE public.login (
  id BIGSERIAL PRIMARY KEY,
  usuario VARCHAR(60) NOT NULL,
  senha CHAR(64) NOT NULL,
  perfil_id integer NOT NULL DEFAULT 2 references perfil(id)
);

INSERT INTO login (usuario, senha, perfil_id) VALUES ('bird', '$2y$10$5d40f13fe318177525fc0ONFKoYjlYorAen41.sKHtHTnaVgvCa3C', 1);

CREATE TABLE public.compra (
  id BIGSERIAL PRIMARY KEY,
  anuncio_id integer references anuncio(id),
  autenticacao_id integer references login(id),
  data timestamp DEFAULT now()
);

