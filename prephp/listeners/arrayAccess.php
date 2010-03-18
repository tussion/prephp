<?php
	function prephp_arrayAccess($tokenStream, $i) {
		$startFuncCall = $i;
		$i = $tokenStream->skipWhitespace($i);
		
		// not a function call
		if (!$tokenStream[$i]->is(T_OPEN_ROUND)) {
			return;
		}
		
		$endFuncCall = $i = $tokenStream->findComplementaryBracket($i);
		
		$i = $tokenStream->skipWhitespace($i);
		
		// not an array access ("[")
		if (!$tokenStream[$i]->is(T_OPEN_SQUARE)) {
			return;
		}
		
		$startArrayAccess = $i;
		
		$endArrayAccess = $tokenStream->findComplementaryBracket($i);
		
		$arrayAccess = $tokenStream->extractStream($startArrayAccess, $endArrayAccess);
		$arrayAccess->extractStream(0, 0); // remove "["
		$arrayAccess->extractStream(count($arrayAccess)-1, count($arrayAccess)-1); // remove "]"
		
		$funcCall = $tokenStream->extractStream($startFuncCall, $endFuncCall);
		
		// now insert prephp_rt_arrayAccess()
		$i = $startFuncCall;
		
		$tokenStream->insertStream($i,
			array(
				new Prephp_Token(
					T_STRING,
					'prephp_rt_arrayAccess',
					$funcCall[0]->getLine()
				),
				new Prephp_Token(
					T_OPEN_ROUND,
					'(',
					$funcCall[0]->getLine()
				),
			)
		);
		
		$tokenStream->insertStream($i += 2,
			$funcCall
		);
		
		$tokenStream->insertToken($i += count($funcCall),
			new Prephp_Token(
				T_COMMA,
				',',
				$funcCall[count($funcCall)-1]->getLine()
			)
		);
		
		$tokenStream->insertStream(++$i,
			$arrayAccess
		);
		
		$tokenStream->insertToken($i += count($arrayAccess),
			new Prephp_Token(
				T_CLOSE_ROUND,
				')',
				$arrayAccess[count($arrayAccess)-1]->getLine()
			)
		);
	}
?>