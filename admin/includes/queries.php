//Query to creat boys_basketball View

CREATE VIEW boys_basketball AS

SELECT l_name, f_name, teams.team_name,basketball_stats.games_played,basketball_stats.school_yr, basketball_stats.conf_ID, basketball_stats.team_ID, fg_made, fg_attempts, concat(round(fg_made/fg_attempts, 2), '%') as fg_percentage,

ft_made, ft_attempts, concat(round(ft_made/ft_attempts, 2), '%') as ft_percentage,

three_made, three_attempts, concat(round(three_made/three_attempts, 2), '%') as three_percentage,

concat((fg_made * 2) + ft_made + three_made) AS ttl_pts, off_rebs, def_rebs, (off_rebs + def_rebs) AS ttl_rebs, assists, steals, fouls, tech_fouls,turn_overs

FROM player_info, basketball_stats, teams

WHERE player_info.ID=basketball_stats.player_ID AND player_info.team_ID = teams.ID AND player_info.b_bball=1



//Query to creat girls_basketball View

CREATE VIEW girls_basketball AS

SELECT l_name, f_name, teams.team_name,basketball_stats.games_played,basketball_stats.school_yr, basketball_stats.conf_ID,basketball_stats.team_ID, fg_made, fg_attempts, concat(round(fg_made/fg_attempts, 2), '%') as fg_percentage,

ft_made, ft_attempts, concat(round(ft_made/ft_attempts, 2), '%') as ft_percentage,

three_made, three_attempts, concat(round(three_made/three_attempts, 2), '%') as three_percentage,

concat((fg_made * 2) + ft_made + three_made) AS ttl_pts, off_rebs, def_rebs, (off_rebs + def_rebs) AS ttl_rebs, assists, steals, fouls, tech_fouls,turn_overs

FROM player_info, basketball_stats,teams

WHERE player_info.ID=basketball_stats.player_ID AND player_info.team_ID = teams.ID AND player_info.g_bball=1