SELECT candidato.nome
FROM candidato,
 ( 
 	SELECT SUM(avaliacao.pontuacao) as total, candidato.numero as num_candidato
 	FROM avaliacao
 	INNER JOIN candidato ON candidato.numero = avaliacao.candidato_numero
 	INNER JOIN vaga ON vaga.id = candidato.vaga_id  
 	WHERE vaga.nome LIKE 'programacao'
 	) pontuacao_candidato
 WHERE pontuacao_candidato.num_candidato = candidato.numero 
 	AND pontuacao_candidato.total = 0;


 SELECT SUM(avaliacao.pontuacao) as total, candidato.instituicao_numero
 FROM avaliacao
 INNER JOIN candidato ON candidato.numero = avaliacao.candidato_numero
 GROUP BY avaliacao.candidato_numero ORDER BY total DESC LIMIT 1;