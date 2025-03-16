<div>
 <p>Bonjour {{ $userName }},</p>
 <p>
     Nous vous informons que vos dépenses actuelles, qui représentent 
     <strong>{{ number_format($totalDepense, 2) }} DH</strong>, soit 
     <strong>{{ number_format($pourcentageDepense, 2) }}%</strong> de votre budget mensuel,
     ont dépassé votre seuil d'alerte de 
     <strong>{{ number_format($seuilAlerte, 2) }}%</strong> du budget.
 </p>
 <p>Veuillez vérifier votre tableau de bord pour plus de détails.</p> 
</div>